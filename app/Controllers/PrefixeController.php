<?php

namespace App\Controllers;

use App\Models\PrefixeModel;
use CodeIgniter\Controller;

class PrefixeController extends Controller
{
    protected PrefixeModel $prefixeModel;

    public function __construct()
    {
        $this->prefixeModel = new PrefixeModel();
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

        $prefixes = $this->prefixeModel->getPrefixes();
        return view('prefixes/index', ['prefixes' => $prefixes]);
    }

    public function ajouter()
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $prefixe = $this->request->getPost('prefixe');
        $operateur = $this->request->getPost('operateur');
        if (!$operateur) {
            $operateur = session('operator_network') ?? 'yas';
        }
        if ($prefixe) {
            $this->prefixeModel->ajouterPrefixe($prefixe, $operateur);
        }
        return redirect()->to('/prefixes');
    }

    public function modifier($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $prefixe = $this->request->getPost('prefixe');
        $operateur = $this->request->getPost('operateur');
        if (!$operateur) {
            $operateur = session('operator_network') ?? 'yas';
        }
        if ($prefixe) {
            $this->prefixeModel->modifierPrefixe($id, $prefixe, $operateur);
        }
        return redirect()->to('/prefixes');
    }

    public function supprimer($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $this->prefixeModel->supprimerPrefixe($id);
        return redirect()->to('/prefixes');
    }
}
