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

    public function enregistrerOperation(array $data): int
    {
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
}
