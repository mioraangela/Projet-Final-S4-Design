<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Gestion des types d’opérations</h1>
                <p class="text-muted mb-4">Définissez les opérations disponibles dans l’application.</p>
                <form method="post" action="/types-operations/ajouter" class="row g-3">
                    <div class="col-md-8">
                        <label for="nom" class="form-label">Nom du type</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex. Paiement facture" required>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Liste des types d’opérations</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($types as $type): ?>
                                <tr>
                                    <td><?= esc($type['nom']) ?></td>
                                    <td>
                                        <a href="/types-operations/supprimer/<?= esc($type['id']) ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
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
