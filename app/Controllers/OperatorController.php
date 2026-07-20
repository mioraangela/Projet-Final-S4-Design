<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\OperationModel;
use CodeIgniter\Controller;

class OperatorController extends Controller
{
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === 'admin') {
            session()->set('role', 'operator');
            session()->set('operator_name', 'Administrateur');
            return redirect()->to('/operator/dashboard');
        }

        return view('operator/login', ['error' => 'Identifiants invalides']);
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
        $gains = $operationModel->calculerGainsOperateur();

        return view('operator/gains', ['gains' => $gains]);
    }

    public function comptes()
    {
        if (session('role') !== 'operator') {
            return redirect()->to('/operator/login');
        }

        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();

        return view('operator/comptes', ['clients' => $clients]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/operator/login');
    }
}
