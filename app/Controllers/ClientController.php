<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\OperationModel;
use CodeIgniter\Controller;

class ClientController extends Controller
{
    protected ClientModel $clientModel;
    protected OperationModel $operationModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->operationModel = new OperationModel();
    }

    public function login()
    {
        $telephone = $this->request->getPost('telephone');

        if ($telephone) {
            $telephoneNormalise = preg_replace('/\D+/', '', trim($telephone));

            if ($telephoneNormalise !== '') {
                $client = $this->clientModel->chercherClientParNumero($telephoneNormalise);
                if (!$client) {
                    $this->clientModel->creerClientAutomatiquement($telephoneNormalise);
                    $client = $this->clientModel->chercherClientParNumero($telephoneNormalise);
                }

                session()->set('client_id', $client['id']);
                session()->set('telephone', $client['telephone']);
                session()->set('role', 'client');
                return redirect()->to('/accueil');
            }
        }

        return view('client/login');
    }

    public function accueil()
    {
        if (session('role') !== 'client') {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $client = $this->clientModel->find($clientId);
        return view('client/accueil', ['client' => $client]);
    }

    public function solde()
    {
        if (session('role') !== 'client') {
            return redirect()->to('/login');
        }

        $clientId = session('client_id');
        if (!$clientId) {
            return redirect()->to('/login');
        }

        $client = $this->clientModel->find($clientId);
        return view('client/solde', ['client' => $client]);
    }
}
