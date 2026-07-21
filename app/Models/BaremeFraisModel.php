<?php

namespace App\Models;

use CodeIgniter\Model;

class BaremeFraisModel extends Model
{
    protected $table            = 'baremes_frais';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['type_operation_id', 'montant_minimum', 'montant_maximum', 'frais', 'commission_autre_operateur', 'operateur'];

    protected $validationRules = [
        'type_operation_id' => 'required|integer',
        'montant_minimum'   => 'required|numeric',
        'montant_maximum'   => 'required|numeric',
        'frais'             => 'required|numeric',
        'commission_autre_operateur' => 'numeric',
        'operateur'         => 'required|string',
    ];

    protected $skipValidation = false;

    public function getBaremes($operateur = null): array
    {
        $this->initialiserSchema();
        $builder = $this->select('baremes_frais.*, types_operation.nom as type_operation_nom')
            ->join('types_operation', 'types_operation.id = baremes_frais.type_operation_id', 'left');
            
        if ($operateur) {
            $builder->where('baremes_frais.operateur', $operateur);
        }
            
        return $builder->orderBy('baremes_frais.type_operation_id', 'ASC')
            ->orderBy('baremes_frais.montant_minimum', 'ASC')
            ->findAll();
    }

    protected function initialiserSchema(): void
    {
        if ($this->db->tableExists($this->table)) {
            $fields = $this->db->getFieldNames($this->table);
            if (!in_array('operateur', $fields)) {
                $this->db->query("ALTER TABLE {$this->table} ADD COLUMN commission_autre_operateur DECIMAL(12,2) DEFAULT 0.00");
                $this->db->query("ALTER TABLE {$this->table} ADD COLUMN operateur VARCHAR(50) DEFAULT 'yas'");
            }
            if ($this->countAllResults() > 0) {
                return;
            }
        } else {
            $this->db->query(
                "CREATE TABLE IF NOT EXISTS {$this->table} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    type_operation_id INTEGER NOT NULL,
                    montant_minimum DECIMAL(12,2) NOT NULL,
                    montant_maximum DECIMAL(12,2) NOT NULL,
                    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00,
                    commission_autre_operateur DECIMAL(12,2) NOT NULL DEFAULT 0.00,
                    promotion DECIMAL(12,2) NOT NULL DEFAULT 0.00,
                    operateur VARCHAR(50) NOT NULL
                )"
            );
        }

        $baremes = [
            // yas
            [1, 1, 5000, 0, 0, 'yas'],
            [1, 5001, 10000, 0, 0, 'yas'],
            [1, 10001, 50000, 0, 0, 'yas'],
            [1, 50001, 100000, 0, 0, 'yas'],
            [1, 100001, 500000, 0, 0, 'yas'],
            [1, 500001, 1000000, 0, 0, 'yas'],
            [1, 1000001, 2000000, 0, 0, 'yas'],
            [2, 1, 5000, 150, 0, 'yas'],
            [2, 5001, 10000, 300, 0, 'yas'],
            [2, 10001, 50000, 800, 0, 'yas'],
            [2, 50001, 100000, 1500, 0, 'yas'],
            [2, 100001, 500000, 3000, 0, 'yas'],
            [2, 500001, 1000000, 5000, 0, 'yas'],
            [2, 1000001, 2000000, 8000, 0, 'yas'],
            [3, 1, 5000, 100, 1, 'yas'],
            [3, 5001, 10000, 200, 2, 'yas'],
            [3, 10001, 50000, 500, 2, 'yas'],
            [3, 50001, 100000, 1000, 2.5, 'yas'],
            [3, 100001, 500000, 2000, 3, 'yas'],
            [3, 500001, 1000000, 3500, 3, 'yas'],
            [3, 1000001, 2000000, 5000, 3, 'yas'],
            // orange
            [1, 1, 5000, 0, 0, 'orange'],
            [1, 5001, 10000, 0, 0, 'orange'],
            [1, 10001, 50000, 0, 0, 'orange'],
            [1, 50001, 100000, 0, 0, 'orange'],
            [1, 100001, 500000, 0, 0, 'orange'],
            [1, 500001, 1000000, 0, 0, 'orange'],
            [1, 1000001, 2000000, 0, 0, 'orange'],
            [2, 1, 5000, 150, 0, 'orange'],
            [2, 5001, 10000, 300, 0, 'orange'],
            [2, 10001, 50000, 800, 0, 'orange'],
            [2, 50001, 100000, 1500, 0, 'orange'],
            [2, 100001, 500000, 3000, 0, 'orange'],
            [2, 500001, 1000000, 5000, 0, 'orange'],
            [2, 1000001, 2000000, 8000, 0, 'orange'],
            [3, 1, 5000, 100, 1, 'orange'],
            [3, 5001, 10000, 200, 2, 'orange'],
            [3, 10001, 50000, 500, 2, 'orange'],
            [3, 50001, 100000, 1000, 2.5, 'orange'],
            [3, 100001, 500000, 2000, 3, 'orange'],
            [3, 500001, 1000000, 3500, 3, 'orange'],
            [3, 1000001, 2000000, 5000, 3, 'orange'],
            // airtel
            [1, 1, 5000, 0, 0, 'airtel'],
            [1, 5001, 10000, 0, 0, 'airtel'],
            [1, 10001, 50000, 0, 0, 'airtel'],
            [1, 50001, 100000, 0, 0, 'airtel'],
            [1, 100001, 500000, 0, 0, 'airtel'],
            [1, 500001, 1000000, 0, 0, 'airtel'],
            [1, 1000001, 2000000, 0, 0, 'airtel'],
            [2, 1, 5000, 150, 0, 'airtel'],
            [2, 5001, 10000, 300, 0, 'airtel'],
            [2, 10001, 50000, 800, 0, 'airtel'],
            [2, 50001, 100000, 1500, 0, 'airtel'],
            [2, 100001, 500000, 3000, 0, 'airtel'],
            [2, 500001, 1000000, 5000, 0, 'airtel'],
            [2, 1000001, 2000000, 8000, 0, 'airtel'],
            [3, 1, 5000, 100, 1, 'airtel'],
            [3, 5001, 10000, 200, 2, 'airtel'],
            [3, 10001, 50000, 500, 2, 'airtel'],
            [3, 50001, 100000, 1000, 2.5, 'airtel'],
            [3, 100001, 500000, 2000, 3, 'airtel'],
            [3, 500001, 1000000, 3500, 3, 'airtel'],
            [3, 1000001, 2000000, 5000, 3, 'airtel']
        ];

        foreach ($baremes as $bareme) {
            $this->insert([
                'type_operation_id' => $bareme[0],
                'montant_minimum' => $bareme[1],
                'montant_maximum' => $bareme[2],
                'frais' => $bareme[3],
                'commission_autre_operateur' => $bareme[4],
                'promotion' => $bareme[5],
                'operateur' => $bareme[6],
            ]);
        }
    }

    public function ajouterBareme(array $data): int
    {
        $this->initialiserSchema();
        return $this->insert($data);
    }

    public function modifierBareme(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function supprimerBareme(int $id): bool
    {
        return $this->delete($id);
    }

    public function rechercherBaremeSelonMontant(int $typeOperationId, float $montant, string $operateur = 'yas'): ?array
    {
        $this->initialiserSchema();
        $bareme = $this->where('type_operation_id', $typeOperationId)
            ->where('montant_minimum <=', $montant)
            ->where('montant_maximum >=', $montant)
            ->where('operateur', $operateur)
            ->first();

        return $bareme;
    }

    public function rechercherFraisSelonMontant(int $typeOperationId, float $montant, string $operateur = 'yas'): ?float
    {
        $bareme = $this->rechercherBaremeSelonMontant($typeOperationId, $montant, $operateur);
        return $bareme ? (float) $bareme['frais'] : 0.0;
    }
}
