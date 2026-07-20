<?= $this->include('partials/header') ?>
<div class="row py-4 justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Situation des gains</h1>
                <div class="alert alert-success">
                    Total des frais collectés : <strong><?= esc(number_format((float) ($gains ?? 0), 0, ',', ' ')) ?> Ariary</strong>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-2">Gains sur notre réseau</h6>
                                <h4 class="mb-0 text-primary"><?= esc(number_format((float) ($details['gains']['meme_operateur'] ?? 0), 0, ',', ' ')) ?> Ar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-2">Gains inter-réseaux</h6>
                                <h4 class="mb-0 text-success"><?= esc(number_format((float) ($details['gains']['autres_operateurs'] ?? 0), 0, ',', ' ')) ?> Ar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-2">Commissions perçues</h6>
                                <h4 class="mb-0 text-warning"><?= esc(number_format((float) ($details['gains']['commissions'] ?? 0), 0, ',', ' ')) ?> Ar</h4>
                            </div>
                        </div>
                    </div>
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
                            <tr class="table-warning fw-bold">
                                <td>Commissions (transferts inter-réseaux)</td>
                                <td>—</td>
                                <td><?= esc(number_format((float) ($details['gains']['commissions'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="/operator/dashboard" class="btn btn-link">Retour</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
