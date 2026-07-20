<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4 text-center">
                <h1 class="h4 mb-3">Solde du compte</h1>
                <p class="text-muted mb-1">Compte associé</p>
                <p class="h5 mb-3"><?= esc($client['telephone'] ?? '') ?></p>
                <p class="text-muted mb-1">Solde disponible</p>
                <p class="display-6 text-success mb-3"><?= esc(number_format((float) ($client['solde'] ?? 0), 0, ',', ' ')) ?> Ariary</p>
                <a href="/accueil" class="btn btn-primary">Retour à l’accueil</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
