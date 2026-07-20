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

    protected $allowedFields = ['type_operation_id', 'montant_minimum', 'montant_maximum', 'frais'];

    protected $validationRules = [
        'type_operation_id' => 'required|integer',
        'montant_minimum'   => 'required|numeric',
        'montant_maximum'   => 'required|numeric',
        'frais'             => 'required|numeric',
    ];

    protected $skipValidation = false;

    public function getBaremes(): array
    {
        return $this->orderBy('type_operation_id', 'ASC')
            ->orderBy('montant_minimum', 'ASC')
            ->findAll();
    }

    public function ajouterBareme(array $data): int
    {
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

    public function rechercherFraisSelonMontant(int $typeOperationId, float $montant): ?float
    {
        $bareme = $this->where('type_operation_id', $typeOperationId)
            ->where('montant_minimum <=', $montant)
            ->where('montant_maximum >=', $montant)
            ->first();

        return $bareme ? (float) $bareme['frais'] : null;
    }
}
