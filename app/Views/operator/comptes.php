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

                <?php if (isset($montants_a_envoyer) && !empty($montants_a_envoyer)): ?>
                <h2 class="h5 mt-5 mb-3 text-danger">Montants à reverser aux autres opérateurs</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Opérateur destinataire</th>
                                <th>Montant total dû</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($montants_a_envoyer as $op => $montant): ?>
                                <tr>
                                    <td><?= esc(ucfirst($op)) ?></td>
                                    <td class="text-danger fw-bold"><?= esc(number_format((float) $montant, 0, ',', ' ')) ?> Ariary</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                <a href="/operator/dashboard" class="btn btn-link">Retour</a>
            </div>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
