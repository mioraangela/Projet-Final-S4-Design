<?php

namespace App\Controllers;

use App\Models\TypeOperationModel;
use CodeIgniter\Controller;

class TypeOperationController extends Controller
{
    protected TypeOperationModel $typeOperationModel;

    public function __construct()
    {
        $this->typeOperationModel = new TypeOperationModel();
    }

    protected function ensureOperator(): bool
    {
        return session('role') === 'operator';
    }

    public function index()
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $types = $this->typeOperationModel->getTypesOperations();
        return view('types_operations/index', ['types' => $types]);
    }

    public function ajouter()
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $nom = $this->request->getPost('nom');
        if ($nom) {
            $this->typeOperationModel->ajouterTypeOperation($nom);
        }
        return redirect()->to('/types-operations');
    }

    public function modifier($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $nom = $this->request->getPost('nom');
        if ($nom) {
            $this->typeOperationModel->modifierTypeOperation($id, $nom);
        }
        return redirect()->to('/types-operations');
    }

    public function supprimer($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $this->typeOperationModel->supprimerTypeOperation($id);
        return redirect()->to('/types-operations');
    }
}
