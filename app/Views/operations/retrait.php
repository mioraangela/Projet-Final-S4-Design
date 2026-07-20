<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Retrait d’argent</h1>
                <p class="text-muted mb-4">Retirez de l’argent depuis votre compte mobile money.</p>
                <form method="post" action="/retrait">
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant à retirer (Ariary)</label>
                        <input type="number" min="100" step="100" class="form-control" name="montant" id="montant" placeholder="10000" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Effectuer le retrait</button>
                    <a href="/accueil" class="btn btn-link">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
