<?php

namespace App\Models;

use CodeIgniter\Model;

class OperationModel extends Model
{
    protected $table            = 'operations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['client_id', 'type_operation_id', 'destinataire', 'montant', 'frais', 'date_operation'];

    protected $validationRules = [
        'client_id'        => 'required|integer',
        'type_operation_id' => 'required|integer',
        'montant'          => 'required|numeric',
        'frais'            => 'required|numeric',
        'date_operation'   => 'required',
    ];

    protected $skipValidation = false;

    protected function initialiserSchema(): void
    {
        if ($this->db->tableExists($this->table)) {
            $this->db->query(
                "CREATE TABLE IF NOT EXISTS operations (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    client_id INTEGER NOT NULL,
                    type_operation_id INTEGER NOT NULL,
                    destinataire VARCHAR(20) DEFAULT NULL,
                    montant DECIMAL(12,2) NOT NULL,
                    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00,
                    date_operation DATETIME NOT NULL
                )"
            );
        } else {
            $this->db->query(
                "CREATE TABLE IF NOT EXISTS {$this->table} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    client_id INTEGER NOT NULL,
                    type_operation_id INTEGER NOT NULL,
                    destinataire VARCHAR(20) DEFAULT NULL,
                    montant DECIMAL(12,2) NOT NULL,
                    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00,
                    date_operation DATETIME NOT NULL
                )"
            );
        }

        if (! $this->db->tableExists('types_operation')) {
            $this->db->query(
                "CREATE TABLE IF NOT EXISTS types_operation (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom VARCHAR(50) NOT NULL UNIQUE
                )"
            );

            $this->db->query("INSERT OR IGNORE INTO types_operation (nom) VALUES ('Dépôt')");
            $this->db->query("INSERT OR IGNORE INTO types_operation (nom) VALUES ('Retrait')");
            $this->db->query("INSERT OR IGNORE INTO types_operation (nom) VALUES ('Transfert')");
        }
    }

    public function enregistrerOperation(array $data): int
    {
        $this->initialiserSchema();
        return $this->insert($data);
    }

    public function getHistoriqueClient(int $clientId): array
    {
        $this->initialiserSchema();

        $rows = $this->select('operations.*, types_operation.nom as type_operation')
            ->join('types_operation', 'types_operation.id = operations.type_operation_id', 'left')
            ->where('operations.client_id', $clientId)
            ->orderBy('operations.date_operation', 'DESC')
            ->findAll();

        foreach ($rows as &$row) {
            if (empty($row['type_operation'])) {
                $row['type_operation'] = 'Transaction';
            }
        }

        return $rows;
    }

    public function getOperateurParTelephone(string $telephone): ?string
    {
        $this->initialiserSchema();
        $prefixes = $this->db->table('prefixes')->orderBy('LENGTH(prefixe)', 'DESC')->get()->getResultArray();
        foreach ($prefixes as $p) {
            if (strpos($telephone, $p['prefixe']) === 0) {
                return $p['operateur'];
            }
        }
        return null;
    }

    public function getGainsDetail(string $operateurCourant): array
    {
        $this->initialiserSchema();
        $baremeModel = new \App\Models\BaremeFraisModel();
        
        $operations = $this->select('operations.*, types_operation.nom as type_operation')
            ->join('types_operation', 'types_operation.id = operations.type_operation_id', 'left')
            ->findAll();

        $gains = [
            'total'              => 0,
            'meme_operateur'     => 0,
            'autres_operateurs'  => 0,
            'commissions'        => 0,  // Commissions reçues (transferts entrants d'autres réseaux)
            'par_type'           => []
        ];
        
        $montantsAEnvoyer = [];

        foreach ($operations as $op) {
            $client = $this->db->table('clients')->where('id', $op['client_id'])->get()->getRowArray();
            if (!$client) continue;
            
            $opClient = $this->getOperateurParTelephone($client['telephone']);
            
            // ---- CAS 1 : Le client expéditeur appartient à l'opérateur courant ----
            if ($opClient === $operateurCourant) {
                $fraisTotal = (float)$op['frais']; // frais_fixe + commission payés par le client
                
                if ($op['destinataire']) {
                    $opDest = $this->getOperateurParTelephone($op['destinataire']);
                    
                    if ($opDest && $opDest !== $operateurCourant) {
                        // Transfert SORTANT vers un autre opérateur
                        // L'opérateur source garde seulement les frais fixes
                        $bareme = $baremeModel->rechercherBaremeSelonMontant(3, (float)$op['montant'], $operateurCourant);
                        $fraisFixe = $bareme ? (float)$bareme['frais'] : 0.0;
                        $tauxCommission = $bareme ? (float)$bareme['commission_autre_operateur'] : 0.0;
                        $commission = ((float)$op['montant'] + $fraisFixe) * $tauxCommission / 100;
                        
                        $gains['total']             += $fraisFixe;
                        $gains['autres_operateurs'] += $fraisFixe;
                        
                        if (!isset($gains['par_type'][$op['type_operation']])) {
                            $gains['par_type'][$op['type_operation']] = 0;
                        }
                        $gains['par_type'][$op['type_operation']] += $fraisFixe;
                        
                        // Tracker la commission due à l'opérateur destinataire
                        if (!isset($montantsAEnvoyer[$opDest])) {
                            $montantsAEnvoyer[$opDest] = 0;
                        }
                        $montantsAEnvoyer[$opDest] += $commission;
                    } else {
                        // Transfert interne : l'opérateur garde tous les frais
                        $gains['total']          += $fraisTotal;
                        $gains['meme_operateur'] += $fraisTotal;
                        
                        if (!isset($gains['par_type'][$op['type_operation']])) {
                            $gains['par_type'][$op['type_operation']] = 0;
                        }
                        $gains['par_type'][$op['type_operation']] += $fraisTotal;
                    }
                } else {
                    // Dépôt ou retrait : l'opérateur garde tous les frais
                    $gains['total']          += $fraisTotal;
                    $gains['meme_operateur'] += $fraisTotal;
                    
                    if (!isset($gains['par_type'][$op['type_operation']])) {
                        $gains['par_type'][$op['type_operation']] = 0;
                    }
                    $gains['par_type'][$op['type_operation']] += $fraisTotal;
                }
            }
            
            // ---- CAS 2 : Transfert ENTRANT vers un client de l'opérateur courant ----
            // L'expéditeur est d'un autre réseau → la commission revient à l'opérateur courant
            if ($op['destinataire'] && $opClient !== $operateurCourant) {
                $opDest = $this->getOperateurParTelephone($op['destinataire']);
                if ($opDest === $operateurCourant) {
                    // Calculer la commission perçue (basée sur le barème de l'opérateur source)
                    $bareme = $baremeModel->rechercherBaremeSelonMontant(3, (float)$op['montant'], $opClient ?? 'yas');
                    $fraisFixe = $bareme ? (float)$bareme['frais'] : 0.0;
                    $tauxCommission = $bareme ? (float)$bareme['commission_autre_operateur'] : 0.0;
                    $commissionRecue = ((float)$op['montant'] + $fraisFixe) * $tauxCommission / 100;
                    
                    $gains['commissions'] += $commissionRecue;
                    $gains['total']       += $commissionRecue;
                }
            }
        }
        
        return [
            'gains'              => $gains,
            'montants_a_envoyer' => $montantsAEnvoyer
        ];
    }
}
