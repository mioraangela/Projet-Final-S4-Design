<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Bienvenue sur Mobile Money Simulator
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="py-4">
    <div class="row gy-4">
        <div class="col-12">
            <div class="card card-mm border-0">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div>
                            <h1 class="h3 mb-2">Bienvenue sur Mobile Money Simulator</h1>
                            <p class="text-muted mb-0">Cette page est générée dynamiquement par CodeIgniter. Utilisez la navigation pour accéder aux modules client et opérateur.</p>
                        </div>
                        <span class="badge bg-success px-3 py-2">Version <?= CodeIgniter\CodeIgniter::CI_VERSION ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card card-mm border-0">
                <div class="card-body">
                    <h2 class="h5 mb-3">Vue d'ensemble</h2>
                    <p class="text-muted">Cette application simule un opérateur Mobile Money. Tous les écrans sont conçus pour l'interface utilisateur, sans modifier la logique backend.</p>
                    <div class="row g-3 mt-3">
                        <div class="col-6 col-md-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-phone-fill fs-4 text-success me-3"></i>
                                    <div>
                                        <div class="text-muted small">Numéro</div>
                                        <div class="fw-semibold">+221 77 123 45 67</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-wallet-fill fs-4 text-success me-3"></i>
                                    <div>
                                        <div class="text-muted small">Solde</div>
                                        <div class="fw-semibold">15 750 FCFA</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-graph-up-arrow fs-4 text-success me-3"></i>
                                    <div>
                                        <div class="text-muted small">Transactions</div>
                                        <div class="fw-semibold">12 opérations</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card card-mm border-0">
                <div class="card-body">
                    <h2 class="h5 mb-3">Accès rapide</h2>
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success" href="#">Dépôt</a>
                        <a class="btn btn-outline-success" href="#">Retrait</a>
                        <a class="btn btn-outline-success" href="#">Transfert</a>
                        <a class="btn btn-outline-success" href="#">Historique</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

