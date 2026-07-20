<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Dépôt Mobile Money
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Dépôt</h1>
                <p class="text-muted mb-0">Saisissez le dépôt pour le client.</p>
            </div>
            <button class="btn btn-secondary" onclick="resetDepotForm();"><i class="bi bi-x-lg me-2"></i>Annuler</button>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card card-mm border-0">
            <div class="card-body">
                <form id="depotForm" novalidate>
                    <div class="mb-3">
                        <label for="depotPhone" class="form-label">Numéro téléphone</label>
                        <input type="tel" class="form-control" id="depotPhone" placeholder="Ex. +221771234567" required pattern="^[+0-9 ]+$">
                        <div class="invalid-feedback">Veuillez saisir un numéro de téléphone valide.</div>
                    </div>
                    <div class="mb-3">
                        <label for="depotAmount" class="form-label">Montant</label>
                        <input type="number" class="form-control" id="depotAmount" placeholder="Ex. 5000" min="1" required>
                        <div class="invalid-feedback">Veuillez saisir un montant positif.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Frais</label>
                        <input type="text" class="form-control" id="depotFee" readonly value="250 FCFA">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" class="form-control fw-bold" id="depotTotal" readonly value="5250 FCFA">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-success" onclick="confirmDepotSubmit();"><i class="bi bi-check-circle me-2"></i>Valider</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="resetDepotForm();">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card card-mm border-0 h-100">
            <div class="card-body">
                <h2 class="h5">Résumé</h2>
                <p class="text-muted">Les frais sont calculés automatiquement côté interface pour améliorer l'expérience utilisateur.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Montant saisi
                        <span id="summaryAmount">0 FCFA</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Frais estimés
                        <span id="summaryFee">250 FCFA</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                        Total
                        <span id="summaryTotal">250 FCFA</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Bootstrap -->
<div class="modal fade" id="confirmDepotModal" tabindex="-1" aria-labelledby="confirmDepotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDepotModalLabel">Confirmer le dépôt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        Confirmez-vous l'envoi du dépôt ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" onclick="submitDepot();">Confirmer</button>
      </div>
    </div>
  </div>
</div>

<?= $this->section('scripts') ?>
<script>
function calculateDepot() {
    var amount = Number(document.getElementById('depotAmount').value) || 0;
    var fee = Math.max(250, Math.round(amount * 0.05));
    var total = amount + fee;
    document.getElementById('depotFee').value = fee + ' FCFA';
    document.getElementById('depotTotal').value = total + ' FCFA';
    document.getElementById('summaryAmount').innerText = amount + ' FCFA';
    document.getElementById('summaryFee').innerText = fee + ' FCFA';
    document.getElementById('summaryTotal').innerText = total + ' FCFA';
}

document.getElementById('depotAmount').addEventListener('input', calculateDepot);

function confirmDepotSubmit() {
    var form = document.getElementById('depotForm');
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
    }
    var modal = new bootstrap.Modal(document.getElementById('confirmDepotModal'));
    modal.show();
}

function submitDepot() {
    document.getElementById('confirmDepotModal').querySelector('[data-bs-dismiss]').click();
    alert('Dépôt validé avec succès.');
}

function resetDepotForm() {
    document.getElementById('depotForm').reset();
    calculateDepot();
}

calculateDepot();
</script>
<?= $this->endSection() ?>
