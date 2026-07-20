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

    public function chercherClientParNumero(string $telephone): ?array
    {
        return $this->where('telephone', trim($telephone))->first();
    }

    public function creerClientAutomatiquement(string $telephone): int
    {
        return $this->insert([
            'telephone' => trim($telephone),
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
