<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Tableau de bord opérateur</h1>
                <p class="text-muted mb-4">Bienvenue, <?= esc(session('operator_name')) ?>.</p>
                <div class="row g-3">
                    <div class="col-md-4"><a href="/prefixes" class="btn btn-outline-primary w-100">Gérer les préfixes</a></div>
                    <div class="col-md-4"><a href="/types-operations" class="btn btn-outline-secondary w-100">Gérer les types d’opérations</a></div>
                    <div class="col-md-4"><a href="/baremes-frais" class="btn btn-outline-warning w-100">Gérer les barèmes de frais</a></div>
                    <div class="col-md-4"><a href="/operator/gains" class="btn btn-outline-success w-100">Voir les gains</a></div>
                    <div class="col-md-4"><a href="/operator/comptes" class="btn btn-outline-info w-100">Voir les comptes clients</a></div>
                    <div class="col-md-4"><a href="/operator/logout" class="btn btn-danger w-100">Déconnexion</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
