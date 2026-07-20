<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Transfert d’argent</h1>
                <p class="text-muted mb-4">Envoyez de l’argent à un autre numéro mobile money.</p>
                <form method="post" action="/transfert">
                    <div class="mb-3">
                        <label for="destinataire" class="form-label">Numéro du bénéficiaire</label>
                        <input type="text" class="form-control" name="destinataire" id="destinataire" placeholder="033 12 345 67" required>
                    </div>
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant à transférer (Ariary)</label>
                        <input type="number" min="100" step="100" class="form-control" name="montant" id="montant" placeholder="15000" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Effectuer le transfert</button>
                    <a href="/accueil" class="btn btn-link">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
