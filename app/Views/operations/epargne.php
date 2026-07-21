<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Epargne d’argent</h1>
                <p class="text-muted mb-4">Epargnez de l’argent a chaque transfert que vous recevez.</p>
                <form method="post" action="/epargne">
                    <div class="mb-3">
                        <label for="pourcentage_epargne" class="form-label">Pourcentage du montant transfere a faire epargner</label>
                        <input type="number" min="0" step="0.1" class="form-control" name="pourcentage_epargne" id="pourcentage_epargne" placeholder="10" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Enregistrer le taux a epargner</button>
                    <a href="/accueil" class="btn btn-link">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
