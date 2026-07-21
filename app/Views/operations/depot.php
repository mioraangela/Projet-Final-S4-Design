<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Dépôt d’argent</h1>
                <p class="text-muted mb-4">Versez de l’argent sur votre compte mobile money.</p>
                <form method="post" action="/depot">
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant à déposer (Ariary)</label>
                        <input type="number" min="100" step="100" class="form-control" name="montant" id="montant" placeholder="5000" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Effectuer le dépôt</button>
                    <a href="/accueil" class="btn btn-link">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>