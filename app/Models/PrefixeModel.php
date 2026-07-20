<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeModel extends Model
{
    protected $table            = 'prefixes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['prefixe'];

    protected $validationRules = [
        'prefixe' => 'required|string|max_length[20]|is_unique[prefixes.prefixe,id,{id}]',
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPrefixes(): array
    {
        return $this->orderBy('prefixe', 'ASC')
            ->findAll();
    }

    public function ajouterPrefixe(string $prefixe): int
    {
        return $this->insert([
            'prefixe' => trim($prefixe),
        ]);
    }

    public function modifierPrefixe(int $id, string $prefixe): bool
    {
        return $this->update($id, [
            'prefixe' => trim($prefixe),
        ]);
    }

    public function supprimerPrefixe(int $id): bool
    {
        return $this->delete($id);
    }
}
