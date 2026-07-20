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

    public function getTypesOperations(): array
    {
        return $this->orderBy('nom', 'ASC')->findAll();
    }

    public function ajouterTypeOperation(string $nom): int
    {
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
