<?= $this->include('partials/header') ?>
<div class="row g-4 py-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h1 class="h4 mb-1">Bienvenue sur votre espace AriaryPay</h1>
                        <p class="text-muted mb-0">Gérez votre compte facilement depuis votre téléphone.</p>
                    </div>
                </div>
                <div class="p-4 rounded-3 bg-light">
                    <p class="text-muted mb-1">Numéro de téléphone</p>
                    <h2 class="h5 mb-3"><?= esc($client['telephone'] ?? '') ?></h2>
                    <p class="text-muted mb-1">Solde disponible</p>
                    <h3 class="display-6 text-success mb-0"><?= esc(number_format((float) ($client['solde'] ?? 0), 0, ',', ' ')) ?> Ariary</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Actions rapides</h2>
                <div class="d-grid gap-2">
                    <a href="/depot" class="btn btn-outline-primary">Dépôt d’argent</a>
                    <a href="/retrait" class="btn btn-outline-warning">Retrait d’argent</a>
                    <a href="/transfert" class="btn btn-outline-secondary">Transfert d’argent</a>
                    <a href="/historique" class="btn btn-outline-info">Historique des transactions</a>
                    <a href="/gains" class="btn btn-outline-success">Voir les gains</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
