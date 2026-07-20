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

    protected $allowedFields = ['prefixe', 'operateur'];

    protected $validationRules = [
        'prefixe' => 'required|string|max_length[20]|is_unique[prefixes.prefixe,id,{id}]',
        'operateur' => 'required|string|max_length[50]',
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected function initialiserSchema(): void
    {
        if ($this->db->tableExists($this->table)) {
            $fields = $this->db->getFieldNames($this->table);
            if (!in_array('operateur', $fields)) {
                $this->db->query("ALTER TABLE {$this->table} ADD COLUMN operateur VARCHAR(50) DEFAULT 'yas'");
                // Mise à jour des préfixes déjà existants avec le bon opérateur
                $this->_assignerOperateursExistants();
            }
            if ($this->countAllResults() > 0) {
                return;
            }
        } else {
            $this->db->query(
                "CREATE TABLE IF NOT EXISTS {$this->table} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    prefixe VARCHAR(20) NOT NULL UNIQUE,
                    operateur VARCHAR(50) NOT NULL
                )"
            );
        }

        $prefixes = [
            '032' => 'orange', '033' => 'airtel', '034' => 'yas', 
            '035' => 'airtel', '037' => 'orange', '038' => 'yas', 
            '+26132' => 'orange', '+26133' => 'airtel', '+26134' => 'yas', 
            '+26135' => 'airtel', '+26137' => 'orange', '+26138' => 'yas'
        ];
        foreach ($prefixes as $prefixe => $op) {
            $this->insert(['prefixe' => $prefixe, 'operateur' => $op]);
        }
    }

    private function _assignerOperateursExistants(): void
    {
        $mapping = [
            '032' => 'orange', '033' => 'airtel', '034' => 'yas',
            '035' => 'airtel', '037' => 'orange', '038' => 'yas',
            '+26132' => 'orange', '+26133' => 'airtel', '+26134' => 'yas',
            '+26135' => 'airtel', '+26137' => 'orange', '+26138' => 'yas',
        ];
        foreach ($mapping as $prefixe => $op) {
            $this->db->query(
                "UPDATE {$this->table} SET operateur = ? WHERE prefixe = ?",
                [$op, $prefixe]
            );
        }
    }

    public function getPrefixes(): array
    {
        $this->initialiserSchema();
        return $this->orderBy('prefixe', 'ASC')
            ->findAll();
    }

    public function ajouterPrefixe(string $prefixe, string $operateur = 'yas'): int
    {
        $this->initialiserSchema();
        return $this->insert([
            'prefixe' => trim($prefixe),
            'operateur' => trim($operateur),
        ]);
    }

    public function modifierPrefixe(int $id, string $prefixe, string $operateur = 'yas'): bool
    {
        return $this->update($id, [
            'prefixe' => trim($prefixe),
            'operateur' => trim($operateur),
        ]);
    }

    public function supprimerPrefixe(int $id): bool
    {
        return $this->delete($id);
    }
}
