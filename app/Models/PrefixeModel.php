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
                    prefixe VARCHAR(20) NOT NULL UNIQUE
                )"
            );
        }

        $prefixes = ['032', '033', '034', '035', '037', '038', '+26132', '+26133', '+26134', '+26135', '+26137', '+26138'];
        foreach ($prefixes as $prefixe) {
            $this->insert(['prefixe' => $prefixe]);
        }
    }

    public function getPrefixes(): array
    {
        $this->initialiserSchema();
        return $this->orderBy('prefixe', 'ASC')
            ->findAll();
    }

    public function ajouterPrefixe(string $prefixe): int
    {
        $this->initialiserSchema();
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
