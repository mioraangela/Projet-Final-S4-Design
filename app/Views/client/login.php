<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-2">Connexion client</h1>
                    <p class="text-muted mb-0">Saisissez votre numéro de téléphone pour accéder à votre espace AriaryPay.</p>
                </div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
                <?php endif; ?>
                <form method="post" action="/login">
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="033 12 345 67" required>
                        <div class="form-text">Exemple : 033 12 345 67</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>

                <div class="text-center mt-3">
                    <a href="/operator/login" class="btn btn-outline-secondary w-100">Se connecter en tant qu’opérateur</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
