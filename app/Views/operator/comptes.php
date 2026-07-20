<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-4">Situation des comptes clients</h1>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Numéro</th>
                                <th>Solde</th>
                                <th>Fiche</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td><?= esc($client['telephone']) ?></td>
                                    <td><?= esc(number_format((float) ($client['solde'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><a href="/operator/comptes/<?= esc($client['id']) ?>" class="btn btn-sm btn-outline-primary">Voir la fiche</a></td>
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
