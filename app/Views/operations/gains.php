<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Gains de l’opérateur</h1>
                <p class="text-muted mb-2">Montant total collecté en frais sur les transactions</p>
                <p class="display-6 text-success mb-3"><?= esc(number_format((float) ($gains ?? 0), 0, ',', ' ')) ?> Ariary</p>
                <a href="/accueil" class="btn btn-outline-primary">Retour</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
