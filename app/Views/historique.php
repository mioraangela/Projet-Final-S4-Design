<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Historique des opérations
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Historique</h1>
                <p class="text-muted mb-0">Toutes les opérations récentes sont affichées ici.</p>
            </div>
            <form class="d-flex" role="search" onsubmit="return false;">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher" id="historySearch">
            </form>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-mm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="historyTable">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Montant</th>
                                <th>Frais</th>
                                <th>Destinataire</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2026-07-20 10:15</td>
                                <td>Dépôt</td>
                                <td>5 000 FCFA</td>
                                <td>250 FCFA</td>
                                <td>-</td>
                                <td><span class="badge bg-success">Terminé</span></td>
                            </tr>
                            <tr>
                                <td>2026-07-19 16:30</td>
                                <td>Transfert</td>
                                <td>2 500 FCFA</td>
                                <td>125 FCFA</td>
                                <td>+221 77 123 45 68</td>
                                <td><span class="badge bg-warning text-dark">En attente</span></td>
                            </tr>
                            <tr>
                                <td>2026-07-18 14:05</td>
                                <td>Retrait</td>
                                <td>1 000 FCFA</td>
                                <td>100 FCFA</td>
                                <td>-</td>
                                <td><span class="badge bg-success">Terminé</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Pagination historique" class="mt-4">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Précédent</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                    </ul>
                </nav>

                <div class="alert alert-info mt-4" role="alert" id="noHistoryAlert" style="display:none;">
                    Aucune opération.
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
var historyRows = Array.from(document.querySelectorAll('#historyTable tbody tr'));
var searchInput = document.getElementById('historySearch');
var noHistoryAlert = document.getElementById('noHistoryAlert');

searchInput.addEventListener('input', function() {
    var filter = this.value.toLowerCase();
    var visible = 0;
    historyRows.forEach(function(row) {
        var text = row.textContent.toLowerCase();
        var match = text.indexOf(filter) > -1;
        row.style.display = match ? '' : 'none';
        if (match) visible++;
    });
    noHistoryAlert.style.display = visible === 0 ? 'block' : 'none';
});
</script>
<?= $this->endSection() ?>
