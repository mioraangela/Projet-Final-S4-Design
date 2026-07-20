<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Gestion des préfixes</h1>
                <p class="text-muted mb-4">Ajoutez les préfixes téléphoniques pris en charge par le service.</p>
                <form method="post" action="/prefixes/ajouter" class="row g-3">
                    <div class="col-md-8">
                        <label for="prefixe" class="form-label">Préfixe</label>
                        <input type="text" class="form-control" id="prefixe" name="prefixe" placeholder="Ex. 034 ou +26134" required>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Liste des préfixes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Préfixe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prefixes as $prefixe): ?>
                                <tr>
                                    <td><?= esc($prefixe['prefixe']) ?></td>
                                    <td>
                                        <a href="/prefixes/supprimer/<?= esc($prefixe['id']) ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/operator/dashboard" class="btn btn-link">Retour</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
