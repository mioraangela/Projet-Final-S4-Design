<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Transfert Mobile Money
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Transfert</h1>
                <p class="text-muted mb-0">Effectuez un transfert entre deux numéros.</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-8">
        <div class="card card-mm border-0">
            <div class="card-body">
                <form id="transfertForm" novalidate>
                    <div class="mb-3">
                        <label for="transfertSender" class="form-label">Numéro expéditeur</label>
                        <input type="tel" class="form-control" id="transfertSender" placeholder="Ex. +221771234567" required pattern="^[+0-9 ]+$">
                        <div class="invalid-feedback">Veuillez saisir un numéro de téléphone valide.</div>
                    </div>
                    <div class="mb-3">
                        <label for="transfertReceiver" class="form-label">Numéro destinataire</label>
                        <input type="tel" class="form-control" id="transfertReceiver" placeholder="Ex. +221771234568" required pattern="^[+0-9 ]+$">
                        <div class="invalid-feedback">Veuillez saisir un numéro de destinataire valide.</div>
                    </div>
                    <div class="mb-3">
                        <label for="transfertAmount" class="form-label">Montant</label>
                        <input type="number" class="form-control" id="transfertAmount" placeholder="Ex. 5000" min="1" required>
                        <div class="invalid-feedback">Le montant doit être positif.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Frais estimés</label>
                        <input type="text" class="form-control" id="transfertFee" readonly value="250 FCFA">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total débité</label>
                        <input type="text" class="form-control fw-semibold" id="transfertTotal" readonly value="5250 FCFA">
                    </div>
                    <button type="button" class="btn btn-success" onclick="confirmTransfert();"><i class="bi bi-send-fill me-2"></i>Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Bootstrap -->
<div class="modal fade" id="confirmTransfertModal" tabindex="-1" aria-labelledby="confirmTransfertModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmTransfertModalLabel">Confirmer le transfert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        Souhaitez-vous confirmer ce transfert ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" onclick="submitTransfert();">Confirmer</button>
      </div>
    </div>
  </div>
</div>

<?= $this->section('scripts') ?>
<script>
function updateTransfertSummary() {
    var amount = Number(document.getElementById('transfertAmount').value) || 0;
    var fee = Math.max(250, Math.round(amount * 0.05));
    var total = amount + fee;
    document.getElementById('transfertFee').value = fee + ' FCFA';
    document.getElementById('transfertTotal').value = total + ' FCFA';
}

document.getElementById('transfertAmount').addEventListener('input', updateTransfertSummary);

document.getElementById('transfertSender').addEventListener('input', function(){
    if (document.getElementById('transfertSender').value === document.getElementById('transfertReceiver').value) {
        document.getElementById('transfertReceiver').setCustomValidity('Le numéro destinataire doit être différent du numéro expéditeur.');
    } else {
        document.getElementById('transfertReceiver').setCustomValidity('');
    }
});

document.getElementById('transfertReceiver').addEventListener('input', function(){
    if (document.getElementById('transfertSender').value === document.getElementById('transfertReceiver').value) {
        document.getElementById('transfertReceiver').setCustomValidity('Le numéro destinataire doit être différent du numéro expéditeur.');
    } else {
        document.getElementById('transfertReceiver').setCustomValidity('');
    }
});

function confirmTransfert() {
    var form = document.getElementById('transfertForm');
    updateTransfertSummary();
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
    }
    var modal = new bootstrap.Modal(document.getElementById('confirmTransfertModal'));
    modal.show();
}

function submitTransfert() {
    document.getElementById('confirmTransfertModal').querySelector('[data-bs-dismiss]').click();
    alert('Transfert confirmé.');
}

updateTransfertSummary();
</script>
<?= $this->endSection() ?>
