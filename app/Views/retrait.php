<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Retrait Mobile Money
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Retrait</h1>
                <p class="text-muted mb-0">Saisissez les informations de retrait du client.</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-7">
        <div class="card card-mm border-0">
            <div class="card-body">
                <form id="retraitForm" novalidate>
                    <div class="mb-3">
                        <label for="retraitPhone" class="form-label">Numéro téléphone</label>
                        <input type="tel" class="form-control" id="retraitPhone" placeholder="Ex. +221771234567" required pattern="^[+0-9 ]+$">
                        <div class="invalid-feedback">Veuillez saisir un numéro de téléphone valide.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Solde actuel</label>
                        <input type="text" class="form-control" id="retraitBalance" readonly value="15 750 FCFA">
                    </div>
                    <div class="mb-3">
                        <label for="retraitAmount" class="form-label">Montant</label>
                        <input type="number" class="form-control" id="retraitAmount" placeholder="Ex. 5000" min="1" required>
                        <div class="invalid-feedback">Veuillez saisir un montant positif.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Frais estimés</label>
                        <input type="text" class="form-control" id="retraitFee" readonly value="250 FCFA">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Montant restant estimé</label>
                        <input type="text" class="form-control fw-semibold" id="retraitRemaining" readonly value="15 250 FCFA">
                    </div>
                    <button type="button" class="btn btn-success" onclick="validateRetrait();"><i class="bi bi-check-lg me-2"></i>Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
function updateRetraitSummary() {
    var amount = Number(document.getElementById('retraitAmount').value) || 0;
    var fee = Math.max(250, Math.round(amount * 0.05));
    var balance = 15750;
    var remainder = Math.max(0, balance - amount - fee);
    document.getElementById('retraitFee').value = fee + ' FCFA';
    document.getElementById('retraitRemaining').value = remainder + ' FCFA';
}

var retraitAmountInput = document.getElementById('retraitAmount');
retraitAmountInput.addEventListener('input', updateRetraitSummary);

function validateRetrait() {
    var form = document.getElementById('retraitForm');
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
    }
    alert('Retrait validé.');
}
</script>
<?= $this->endSection() ?>
