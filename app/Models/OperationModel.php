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
            return;
        }

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

    public function enregistrerOperation(array $data): int
    {
        $this->initialiserSchema();
        return $this->insert($data);
    }

    public function getHistoriqueClient(int $clientId): array
    {
        return $this->select('operations.*, types_operation.nom as type_operation')
            ->join('types_operation', 'types_operation.id = operations.type_operation_id', 'left')
            ->where('operations.client_id', $clientId)
            ->orderBy('operations.date_operation', 'DESC')
            ->findAll();
    }

    public function calculerGainsOperateur(): float
    {
        $rows = $this->selectSum('frais')->first();
        return (float) ($rows['frais'] ?? 0);
    }

    public function getGainsParTypeOperation(): array
    {
        return $this->select('operations.type_operation_id, types_operation.nom, SUM(operations.frais) as total_frais, COUNT(operations.id) as nombre_transactions')
            ->join('types_operation', 'types_operation.id = operations.type_operation_id', 'left')
            ->groupBy('operations.type_operation_id, types_operation.nom')
            ->orderBy('types_operation.nom', 'ASC')
            ->findAll();
    }
}
