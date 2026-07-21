// Je dois voir toute la page ou le client peut gerer son epargne.

<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Epargne Mobile Money
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Epargne</h1>
                <p class="text-muted mb-0">Gérez votre épargne mobile money.</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-7">
        <div class="card card-mm border-0">
            <div class="card-body">
                <form id="epargneForm" novalidate>
                    <div class="mb-3">
                        <label for="pourcentage_epargne" class="form-label">Pourcentage du montant transfere a faire epargner</label>
                        <input type="number" min="0" step="0.1" class="form-control" name="pourcentage_epargne" id="pourcentage_epargne" placeholder="10" required>
                        <div class="invalid-feedback">Veuillez saisir un pourcentage valide.</div>
                    </div>
                    <button type="submit" class="btn btn-warning">Enregistrer le taux a epargner</button>
                    <a href="/accueil" class="btn btn-link">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
function validateEpargne() {
    var pourcentage = document.getElementById('pourcentage_epargne').value;
    if (pourcentage < 0) {
        alert('Veuillez saisir un pourcentage positif.');
        return false;
    }
    alert('Taux d’épargne enregistré : ' + pourcentage + '%');
}

function updateEpargneSummary() {
    var pourcentage = Number(document.getElementById('pourcentage_epargne').value) || 0;
}
document.getElementById('epargneForm').addEventListener('submit', function(event) {
    event.preventDefault();
    validateEpargne();
});
document.getElementById('pourcentage_epargne').addEventListener('input', updateEpargneSummary);

function updateEpargneSolde() {
    var montantTransfere = Number(document.getElementById('montant_transfere').value) || 0;
    var pourcentage = Number(document.getElementById('pourcentage_epargne').value) || 0;
    var soldeActuel = 15750;
    var montantEpargne = (montantTransfere * pourcentage / 100).toFixed(2);
    document.getElementById('epargneMontant').value = montantEpargne + ' Ar';
}
</script>
<?= $this->endSection() ?>
