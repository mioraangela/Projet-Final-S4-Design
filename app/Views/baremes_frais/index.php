<?= $this->include('partials/header') ?>
<div class="row py-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Barèmes de frais</h1>
                <p class="text-muted mb-4">Ajoutez un nouveau barème pour un type d’opération donné.</p>
                <form method="post" action="/baremes-frais/ajouter" class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label">Type d’opération</label>
                        <select class="form-select" name="type_operation_id" required>
                            <option value="">Choisir</option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= esc($type['id']) ?>"><?= esc($type['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Montant min</label>
                        <input type="number" class="form-control" name="montant_minimum" min="0" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Montant max</label>
                        <input type="number" class="form-control" name="montant_maximum" min="0" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Frais</label>
                        <input type="number" class="form-control" name="frais" min="0" step="0.01" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" title="Commission supplémentaire vers un autre opérateur (%)">Comm. ext (%)</label>
                        <input type="number" class="form-control" name="commission_autre_operateur" min="0" step="0.01" value="0" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" title="Promotion pour les transfert internes (%)">Promotion (%)</label>
                        <input type="number" class="form-control" name="promotion" min="0" step="0.01" value="0" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Liste des barèmes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Type</th>
                                <th>Montant min</th>
                                <th>Montant max</th>
                                <th>Frais</th>
                                <th>Comm. ext (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($baremes as $bareme): ?>
                                <tr>
                                    <td><?= esc($bareme['type_operation_nom'] ?? $bareme['type_operation_id']) ?></td>
                                    <td><?= esc(number_format((float) ($bareme['montant_minimum'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><?= esc(number_format((float) ($bareme['montant_maximum'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><?= esc(number_format((float) ($bareme['frais'] ?? 0), 0, ',', ' ')) ?> Ariary</td>
                                    <td><?= esc(number_format((float) ($bareme['commission_autre_operateur'] ?? 0), 2, ',', ' ')) ?> %</td>
                                    <td><?= esc(number_format((float) ($bareme['promotion'] ?? 0), 2, ',', ' ')) ?> %</td>
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
