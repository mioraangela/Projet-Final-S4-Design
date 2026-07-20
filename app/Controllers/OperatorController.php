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

        // Chaque opérateur a ses propres identifiants : yas/yas, orange/orange, airtel/airtel
        $credentials = [
            'yas'    => ['password' => 'yas',    'label' => 'Yas'],
            'orange' => ['password' => 'orange', 'label' => 'Orange'],
            'airtel' => ['password' => 'airtel', 'label' => 'Airtel'],
        ];

        if ($username && isset($credentials[$username]) && $password === $credentials[$username]['password']) {
            session()->set('role', 'operator');
            session()->set('operator_name', $credentials[$username]['label']);
            session()->set('operator_network', $username);
            return redirect()->to('/operator/dashboard');
        }

        return view('operator/login', ['error' => 'Identifiants incorrects.']);
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
        $operateurCourant = session('operator_network') ?? 'yas';
        $client = $clientModel->find($id);

        if (!$client) {
            return redirect()->to('/operator/comptes');
        }
        
        // Vérifier que le client appartient bien à cet opérateur
        $opClient = $operationModel->getOperateurParTelephone($client['telephone']);
        if ($opClient !== $operateurCourant) {
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
