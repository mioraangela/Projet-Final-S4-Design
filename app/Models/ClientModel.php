<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['telephone', 'solde'];

    protected $validationRules = [
        'telephone' => 'required|string|max_length[20]|is_unique[clients.telephone,id,{id}]',
        'solde'     => 'required|numeric',
    ];

    protected $skipValidation = false;

    protected function normaliserTelephone(string $telephone): string
    {
        return preg_replace('/\D+/', '', trim($telephone));
    }

    public function chercherClientParNumero(string $telephone): ?array
    {
        return $this->where('telephone', $this->normaliserTelephone($telephone))->first();
    }

    protected function initialiserSchema(): void
    {
        if ($this->db->tableExists($this->table)) {
            return;
        }

        $this->db->query(
            "CREATE TABLE IF NOT EXISTS {$this->table} (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                telephone VARCHAR(20) NOT NULL UNIQUE,
                solde DECIMAL(12,2) NOT NULL DEFAULT 0.00
            )"
        );
    }

    public function trouverOuCreerClient(string $telephone): ?array
    {
        $this->initialiserSchema();

        $telephoneNormalise = $this->normaliserTelephone($telephone);

        $client = $this->where('telephone', $telephoneNormalise)->first();

        if ($client) {
            return $client;
        }

        $id = $this->insert([
            'telephone' => $telephoneNormalise,
            'solde' => 0,
        ]);

        return $id ? $this->find($id) : null;
    }

    public function creerClientAutomatiquement(string $telephone): int
    {
        return $this->insert([
            'telephone' => $this->normaliserTelephone($telephone),
            'solde' => 0,
        ]);
    }

    public function recupererSolde(int $id): ?float
    {
        $client = $this->find($id);
        return $client ? (float) $client['solde'] : null;
    }

    public function modifierSolde(int $id, float $nouveauSolde): bool
    {
        return $this->update($id, ['solde' => $nouveauSolde]);
    }
}
