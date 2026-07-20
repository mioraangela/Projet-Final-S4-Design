<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Configuration des préfixes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div>
                <h1 class="h3 mb-1">Configuration des préfixes</h1>
                <p class="text-muted mb-0">Gérez les préfixes utilisés par le système Mobile Money.</p>
            </div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#prefixAddModal"><i class="bi bi-plus-lg me-2"></i>Ajouter</button>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-mm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Préfixe</th>
                                <th>Description</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>221</td>
                                <td>Préfixe national</td>
                                <td><span class="badge bg-success">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#prefixEditModal">Modifier</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmPrefixDelete('221');">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>00221</td>
                                <td>Préfixe international</td>
                                <td><span class="badge bg-secondary">Inactif</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#prefixEditModal">Modifier</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmPrefixDelete('00221');">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>077</td>
                                <td>Préfixe pour mobile</td>
                                <td><span class="badge bg-success">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#prefixEditModal">Modifier</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmPrefixDelete('077');">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajouter -->
<div class="modal fade" id="prefixAddModal" tabindex="-1" aria-labelledby="prefixAddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prefixAddModalLabel">Ajouter un préfixe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form id="prefixAddForm" novalidate>
            <div class="mb-3">
                <label for="newPrefix" class="form-label">Préfixe</label>
                <input type="text" class="form-control" id="newPrefix" placeholder="Ex. 221" required pattern="[0-9]+">
                <div class="invalid-feedback">Veuillez saisir un préfixe valide.</div>
            </div>
            <div class="mb-3">
                <label for="newPrefixLabel" class="form-label">Description</label>
                <input type="text" class="form-control" id="newPrefixLabel" placeholder="Ex. Préfixe national" required>
                <div class="invalid-feedback">La description est requise.</div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" onclick="submitPrefixAdd();">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="prefixEditModal" tabindex="-1" aria-labelledby="prefixEditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prefixEditModalLabel">Modifier un préfixe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form id="prefixEditForm" novalidate>
            <div class="mb-3">
                <label for="editPrefix" class="form-label">Préfixe</label>
                <input type="text" class="form-control" id="editPrefix" placeholder="Ex. 221" required pattern="[0-9]+">
                <div class="invalid-feedback">Veuillez saisir un préfixe valide.</div>
            </div>
            <div class="mb-3">
                <label for="editPrefixLabel" class="form-label">Description</label>
                <input type="text" class="form-control" id="editPrefixLabel" placeholder="Ex. Préfixe national" required>
                <div class="invalid-feedback">La description est requise.</div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="submitPrefixEdit();">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<?= $this->section('scripts') ?>
<script>
function submitPrefixAdd() {
    var form = document.getElementById('prefixAddForm');
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
    }
    var toast = new bootstrap.Toast(document.getElementById('toastPrefixAdd'));
    toast.show();
    document.getElementById('prefixAddModal').querySelector('[data-bs-dismiss]').click();
}

function submitPrefixEdit() {
    var form = document.getElementById('prefixEditForm');
    if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
    }
    var toast = new bootstrap.Toast(document.getElementById('toastPrefixEdit'));
    toast.show();
    document.getElementById('prefixEditModal').querySelector('[data-bs-dismiss]').click();
}

function confirmPrefixDelete(prefix) {
    if (confirm('Supprimer le préfixe ' + prefix + ' ?')) {
        alert('Préfixe ' + prefix + ' supprimé.');
    }
}
</script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
  <div id="toastPrefixAdd" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">Préfixe ajouté avec succès.</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fermer"></button>
    </div>
  </div>
  <div id="toastPrefixEdit" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">Préfixe modifié avec succès.</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fermer"></button>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
