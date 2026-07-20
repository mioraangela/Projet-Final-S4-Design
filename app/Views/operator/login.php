<?= $this->include('partials/header') ?>
<div class="row justify-content-center py-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Connexion opérateur</h1>
                <p class="text-muted mb-4">Connectez-vous avec vos identifiants opérateur pour accéder à la gestion.</p>
                <?php if (! empty($error)): ?>
                    <div class="alert alert-danger"><?= esc($error) ?></div>
                <?php endif; ?>
                <form method="post" action="/operator/login">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="yas / orange / airtel" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
