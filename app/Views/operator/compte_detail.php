<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Fiche client</h1>
                <div class="p-4 rounded-3 bg-light">
                    <p class="text-muted mb-1">Numéro</p>
                    <h2 class="h5 mb-3"><?= esc($client['telephone'] ?? '') ?></h2>
                    <p class="text-muted mb-1">Solde</p>
                    <h3 class="display-6 text-success mb-0"><?= esc(number_format((float) ($client['solde'] ?? 0), 0, ',', ' ')) ?> Ariary</h3>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Historique des transactions</h2>
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
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td><?= esc($transaction['date_operation'] ?? '') ?></td>
                                    <td><?= esc($transaction['type_operation'] ?? 'Transaction') ?></td>
                                    <td><?= esc(number_format((float) ($transaction['montant'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><?= esc(number_format((float) ($transaction['frais'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><?= esc($transaction['destinataire'] ?: '—') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/operator/comptes" class="btn btn-link">Retour à la liste</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
