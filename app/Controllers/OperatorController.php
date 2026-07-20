<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\OperationModel;
use CodeIgniter\Controller;

class OperatorController extends Controller
{
    protected function getOperatorLabel(string $value): string
    {
        $labels = [
            'yas' => 'Yas',
            'orange' => 'Orange',
            'airtel' => 'Airtel',
        ];

        return $labels[$value] ?? 'Opérateur';
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $operatorChoice = $this->request->getPost('operator_choice');

        if ($username === 'admin' && $password === 'admin' && $operatorChoice) {
            session()->set('role', 'operator');
            session()->set('operator_name', $this->getOperatorLabel($operatorChoice));
            session()->set('operator_network', $operatorChoice);
            return redirect()->to('/operator/dashboard');
        }

        return view('operator/login', ['error' => 'Veuillez choisir un opérateur et saisir les identifiants.']);
    }

    public function dashboard()
    {
        if (session('role') !== 'operator') {
            return redirect()->to('/operator/login');
        }

        return view('operator/dashboard');
    }

    public function gains()
    {
        if (session('role') !== 'operator') {
            return redirect()->to('/operator/login');
        }

        $operationModel = new OperationModel();
        $operateurCourant = session('operator_network') ?? 'yas';
        $details = $operationModel->getGainsDetail($operateurCourant);
        
        $stats = [];
        foreach ($details['gains']['par_type'] as $nom => $montant) {
            $stats[] = ['nom' => $nom, 'nombre_transactions' => '-', 'total_frais' => $montant];
        }

        return view('operator/gains', ['stats' => $stats, 'gains' => $details['gains']['total'], 'details' => $details]);
    }

    public function comptes()
    {
        if (session('role') !== 'operator') {
            return redirect()->to('/operator/login');
        }

        $clientModel = new ClientModel();
        $operationModel = new OperationModel();
        $operateurCourant = session('operator_network') ?? 'yas';
        
        $allClients = $clientModel->findAll();
        $clients = [];
        foreach ($allClients as $client) {
            $op = $operationModel->getOperateurParTelephone($client['telephone']);
            if ($op === $operateurCourant) {
                $clients[] = $client;
            }
        }
        
        $details = $operationModel->getGainsDetail($operateurCourant);

        return view('operator/comptes', ['clients' => $clients, 'montants_a_envoyer' => $details['montants_a_envoyer']]);
    }

    public function detailCompte($id)
    {
        if (session('role') !== 'operator') {
            return redirect()->to('/operator/login');
        }

        $clientModel = new ClientModel();
        $operationModel = new OperationModel();
        $client = $clientModel->find($id);

        if (!$client) {
            return redirect()->to('/operator/comptes');
        }

        $transactions = $operationModel->getHistoriqueClient($id);
        return view('operator/compte_detail', ['client' => $client, 'transactions' => $transactions]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/operator/login');
    }
}
