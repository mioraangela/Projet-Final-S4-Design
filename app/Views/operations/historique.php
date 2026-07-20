<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <h1 class="h4 mb-4">Historique des transactions</h1>
                <?php if (empty($operations)): ?>
                    <p class="text-muted">Aucune transaction n’a encore été effectuée sur ce compte.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Montant</th>
                                    <th>Frais</th>
                                    <th>Bénéficiaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($operations as $operation): ?>
                                    <tr>
                                        <td><?= esc($operation['date_operation']) ?></td>
                                        <td><?= esc($operation['type_operation'] ?? 'Transaction') ?></td>
                                        <td><?= esc(number_format((float) ($operation['montant'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                        <td><?= esc(number_format((float) ($operation['frais'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                        <td><?= esc($operation['destinataire'] ?: '—') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                <a href="/accueil" class="btn btn-link">Retour</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
