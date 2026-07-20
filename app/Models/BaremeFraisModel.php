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
        return $this->select('baremes_frais.*, types_operation.nom as type_operation_nom')
            ->join('types_operation', 'types_operation.id = baremes_frais.type_operation_id', 'left')
            ->orderBy('baremes_frais.type_operation_id', 'ASC')
            ->orderBy('baremes_frais.montant_minimum', 'ASC')
            ->findAll();
    }

    protected function initialiserSchema(): void
    {
        if ($this->db->tableExists($this->table)) {
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
                    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00
                )"
            );
        }

        $baremes = [
            [1, 1, 5000, 0],
            [1, 5001, 10000, 0],
            [1, 10001, 50000, 0],
            [1, 50001, 100000, 0],
            [1, 100001, 500000, 0],
            [1, 500001, 1000000, 0],
            [1, 1000001, 2000000, 0],
            [2, 1, 5000, 150],
            [2, 5001, 10000, 300],
            [2, 10001, 50000, 800],
            [2, 50001, 100000, 1500],
            [2, 100001, 500000, 3000],
            [2, 500001, 1000000, 5000],
            [2, 1000001, 2000000, 8000],
            [3, 1, 5000, 100],
            [3, 5001, 10000, 200],
            [3, 10001, 50000, 500],
            [3, 50001, 100000, 1000],
            [3, 100001, 500000, 2000],
            [3, 500001, 1000000, 3500],
            [3, 1000001, 2000000, 5000],
        ];

        foreach ($baremes as $bareme) {
            $this->insert([
                'type_operation_id' => $bareme[0],
                'montant_minimum' => $bareme[1],
                'montant_maximum' => $bareme[2],
                'frais' => $bareme[3],
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

    public function rechercherFraisSelonMontant(int $typeOperationId, float $montant): ?float
    {
        $this->initialiserSchema();
        $bareme = $this->where('type_operation_id', $typeOperationId)
            ->where('montant_minimum <=', $montant)
            ->where('montant_maximum >=', $montant)
            ->first();

        return $bareme ? (float) $bareme['frais'] : 0.0;
    }
}
