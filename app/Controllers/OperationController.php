<?php

namespace App\Controllers;

use App\Models\BaremeFraisModel;
use App\Models\ClientModel;
use App\Models\OperationModel;
use CodeIgniter\Controller;

class OperationController extends Controller
{
    protected ClientModel $clientModel;
    protected BaremeFraisModel $baremeModel;
    protected OperationModel $operationModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->baremeModel = new BaremeFraisModel();
        $this->operationModel = new OperationModel();
    }

    protected function ensureClient(): bool
    {
        return session('role') === 'client';
    }

    public function depot()
    {
        if (!$this->ensureClient()) {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $montant = $this->request->getPost('montant');
        if ($montant !== null) {
            $client = $this->clientModel->find($clientId);
            $nouveauSolde = (float) $client['solde'] + (float) $montant;
            $this->clientModel->modifierSolde($clientId, $nouveauSolde);
            $this->operationModel->enregistrerOperation([
                'client_id' => $clientId,
                'type_operation_id' => 1,
                'destinataire' => null,
                'montant' => $montant,
                'frais' => 0,
                'date_operation' => date('Y-m-d H:i:s'),
            ]);
        }

        return view('operations/depot');
    }

    public function retrait()
    {
        if (!$this->ensureClient()) {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $montant = $this->request->getPost('montant');
        if ($montant !== null) {
            $client = $this->clientModel->find($clientId);
            $frais = $this->baremeModel->rechercherFraisSelonMontant(2, (float) $montant);
            $nouveauSolde = (float) $client['solde'] - (float) $montant - (float) $frais;
            $this->clientModel->modifierSolde($clientId, $nouveauSolde);
            $this->operationModel->enregistrerOperation([
                'client_id' => $clientId,
                'type_operation_id' => 2,
                'destinataire' => null,
                'montant' => $montant,
                'frais' => $frais,
                'date_operation' => date('Y-m-d H:i:s'),
            ]);
        }

        return view('operations/retrait');
    }

    public function transfert()
    {
        if (!$this->ensureClient()) {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $montant = $this->request->getPost('montant');
        $destinataire = $this->request->getPost('destinataire');
        if ($montant !== null && $destinataire) {
            $client = $this->clientModel->find($clientId);
            $frais = $this->baremeModel->rechercherFraisSelonMontant(3, (float) $montant);
            $nouveauSolde = (float) $client['solde'] - (float) $montant - (float) $frais;
            $this->clientModel->modifierSolde($clientId, $nouveauSolde);
            $this->operationModel->enregistrerOperation([
                'client_id' => $clientId,
                'type_operation_id' => 3,
                'destinataire' => $destinataire,
                'montant' => $montant,
                'frais' => $frais,
                'date_operation' => date('Y-m-d H:i:s'),
            ]);
        }

        return view('operations/transfert');
    }

    public function historique()
    {
        if (!$this->ensureClient()) {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $operations = $this->operationModel->getHistoriqueClient($clientId);
        return view('operations/historique', ['operations' => $operations]);
    }

    public function gains()
    {
        $gains = $this->operationModel->calculerGainsOperateur();
        return view('operations/gains', ['gains' => $gains]);
    }
}
