<?php

namespace App\Controllers;

use App\Models\BaremeFraisModel;
use App\Models\TypeOperationModel;
use CodeIgniter\Controller;

class BaremeFraisController extends Controller
{
    protected BaremeFraisModel $baremeModel;
    protected TypeOperationModel $typeOperationModel;

    public function __construct()
    {
        $this->baremeModel = new BaremeFraisModel();
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

        $operateur = session('operator_network') ?? 'yas';
        $baremes = $this->baremeModel->getBaremes($operateur);
        $types = $this->typeOperationModel->getTypesOperations();
        return view('baremes_frais/index', ['baremes' => $baremes, 'types' => $types]);
    }

    public function ajouter()
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $data = $this->request->getPost();
        if ($data) {
            $data['operateur'] = session('operator_network') ?? 'yas';
            $this->baremeModel->ajouterBareme($data);
        }
        return redirect()->to('/baremes-frais');
    }

    public function modifier($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $data = $this->request->getPost();
        if ($data) {
            $data['operateur'] = session('operator_network') ?? 'yas';
            $this->baremeModel->modifierBareme($id, $data);
        }
        return redirect()->to('/baremes-frais');
    }

    public function supprimer($id)
    {
        if (!$this->ensureOperator()) {
            return redirect()->to('/operator/login');
        }

        $this->baremeModel->supprimerBareme($id);
        return redirect()->to('/baremes-frais');
    }
}
