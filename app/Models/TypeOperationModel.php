<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeOperationModel extends Model
{
    protected $table            = 'types_operation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['nom'];

    protected $validationRules = [
        'nom' => 'required|string|max_length[50]|is_unique[types_operation.nom,id,{id}]',
    ];

    protected $skipValidation = false;

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
                    nom VARCHAR(50) NOT NULL UNIQUE
                )"
            );
        }

        $this->insert(['nom' => 'Dépôt']);
        $this->insert(['nom' => 'Retrait']);
        $this->insert(['nom' => 'Transfert']);
    }

    public function getTypesOperations(): array
    {
        $this->initialiserSchema();
        return $this->orderBy('nom', 'ASC')->findAll();
    }

    public function ajouterTypeOperation(string $nom): int
    {
        $this->initialiserSchema();
        return $this->insert(['nom' => trim($nom)]);
    }

    public function modifierTypeOperation(int $id, string $nom): bool
    {
        return $this->update($id, ['nom' => trim($nom)]);
    }

    public function supprimerTypeOperation(int $id): bool
    {
        return $this->delete($id);
    }
}
