<?= $this->include('partials/header') ?>
<div class="row py-4 justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Situation des gains</h1>
                <div class="alert alert-success">
                    Total des frais collectés : <strong><?= esc(number_format((float) ($gains ?? 0), 0, ',', ' ')) ?> Ariary</strong>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Type d’opération</th>
                                <th>Nombre de transactions</th>
                                <th>Montant des frais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stats as $stat): ?>
                                <tr>
                                    <td><?= esc($stat['nom'] ?? '—') ?></td>
                                    <td><?= esc($stat['nombre_transactions'] ?? 0) ?></td>
                                    <td><?= esc(number_format((float) ($stat['total_frais'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
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
