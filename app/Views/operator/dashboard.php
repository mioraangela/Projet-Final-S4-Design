<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h1 class="h4 mb-1">Tableau de bord opérateur</h1>
                        <p class="text-muted mb-0">Bienvenue, <?= esc(session('operator_name')) ?>.</p>
                    </div>
                    <a href="/operator/logout" class="btn btn-outline-danger btn-sm">Déconnexion</a>
                </div>
                <div class="row g-3">
                    <div class="col-md-4"><a href="/prefixes" class="btn btn-outline-primary w-100">Gérer les préfixes</a></div>
                    <div class="col-md-4"><a href="/types-operations" class="btn btn-outline-secondary w-100">Gérer les types d’opérations</a></div>
                    <div class="col-md-4"><a href="/baremes-frais" class="btn btn-outline-warning w-100">Gérer les barèmes de frais</a></div>
                    <div class="col-md-4"><a href="/operator/gains" class="btn btn-outline-success w-100">Voir les gains</a></div>
                    <div class="col-md-4"><a href="/operator/comptes" class="btn btn-outline-info w-100">Voir les comptes clients</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
