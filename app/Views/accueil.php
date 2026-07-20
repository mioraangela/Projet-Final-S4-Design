<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Accueil client
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Accueil client</h1>
                <p class="text-muted mb-0">Vue de synthèse du compte client.</p>
            </div>
            <span class="badge bg-success px-3 py-2">Connecté</span>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-mm border-0">
            <div class="card-body">
                <h5 class="mb-3">Numéro connecté</h5>
                <p class="h4 fw-semibold">+221 77 123 45 67</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-mm border-0">
            <div class="card-body">
                <h5 class="mb-3">Solde actuel</h5>
                <p class="h4 fw-semibold text-success">15 750 FCFA</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-mm border-0">
            <div class="card-body">
                <h5 class="mb-3">Accès rapide</h5>
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-success btn-sm" href="#">Dépôt</a>
                    <a class="btn btn-outline-success btn-sm" href="#">Retrait</a>
                    <a class="btn btn-outline-success btn-sm" href="#">Transfert</a>
                    <a class="btn btn-outline-success btn-sm" href="#">Historique</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="card card-mm border-0">
                    <div class="card-body">
                        <h5 class="mb-3">Résumé du compte</h5>
                        <p class="text-muted">Aperçu rapide des services Mobile Money disponibles.</p>
                        <div class="row row-cols-1 row-cols-sm-2 g-3 mt-2">
                            <div class="col"><span class="badge bg-success">Dépôt</span></div>
                            <div class="col"><span class="badge bg-success">Retrait</span></div>
                            <div class="col"><span class="badge bg-success">Transfert</span></div>
                            <div class="col"><span class="badge bg-success">Historique</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card card-mm border-0">
                    <div class="card-body">
                        <h5 class="mb-3">Aperçu des actions</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Déposer de l'argent <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Retirer de l'argent <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Transférer de l'argent <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Consulter l'historique <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
