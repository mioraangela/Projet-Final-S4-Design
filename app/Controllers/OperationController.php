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
            $opClient = $this->operationModel->getOperateurParTelephone($client['telephone']) ?? 'yas';
            $frais = $this->baremeModel->rechercherFraisSelonMontant(2, (float) $montant, $opClient);
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

        $montantTotal = $this->request->getPost('montant');
        $destinatairesInput = $this->request->getPost('destinataire');
        $inclureFraisRetrait = $this->request->getPost('inclure_frais_retrait') ? true : false;
        
        if ($montantTotal !== null && $destinatairesInput) {
            $client = $this->clientModel->find($clientId);
            $opClient = $this->operationModel->getOperateurParTelephone($client['telephone']) ?? 'yas';
            
            $destinatairesList = preg_split('/[\s,;]+/', trim($destinatairesInput));
            $destinatairesList = array_filter($destinatairesList);
            $nbDestinataires = count($destinatairesList);
            
            if ($nbDestinataires > 0) {
                $montantParDestinataire = (float)$montantTotal / $nbDestinataires;
                $soldeActuel = (float)$client['solde'];
                
                foreach ($destinatairesList as $destinataire) {
                    $montantATransferer = $montantParDestinataire;
                    
                    if ($inclureFraisRetrait) {
                        $fraisRetrait = $this->baremeModel->rechercherFraisSelonMontant(2, $montantParDestinataire, $opClient);
                        $montantATransferer += $fraisRetrait;
                    }
                    
                    // Frais fixes de transfert (reste chez l'opérateur source)
                    $bareme = $this->baremeModel->rechercherBaremeSelonMontant(3, $montantATransferer, $opClient);
                    $fraisFixe = $bareme ? (float)$bareme['frais'] : 0.0;
                    
                    // Commission inter-opérateur = (montant + frais_fixe) × taux%
                    // Elle est due à l'opérateur destinataire
                    $commission = 0.0;
                    $opDest = $this->operationModel->getOperateurParTelephone($destinataire);
                    if ($opDest && $opDest !== $opClient) {
                        $tauxCommission = $bareme ? (float)$bareme['commission_autre_operateur'] : 0.0;
                        $commission = ($montantATransferer + $fraisFixe) * $tauxCommission / 100;
                    }
                    
                    // Total frais payés par le client = frais_fixe + commission
                    $fraisTotal = $fraisFixe + $commission;
                    
                    // Débit client : montant + frais_fixe + commission
                    $soldeActuel -= ($montantATransferer + $fraisTotal);
                    
                    $this->operationModel->enregistrerOperation([
                        'client_id'         => $clientId,
                        'type_operation_id' => 3,
                        'destinataire'      => $destinataire,
                        'montant'           => $montantATransferer,
                        'frais'             => $fraisTotal,
                        'date_operation'    => date('Y-m-d H:i:s'),
                    ]);
                }
                
                $this->clientModel->modifierSolde($clientId, $soldeActuel);
            }
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
