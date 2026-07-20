<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? esc($title) : 'Mobile Money' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fb; }
        .card { border: none; box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.08); }
        .navbar-brand { font-weight: 700; }
        .footer { background: #fff; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">AriaryPay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php $session = service('session'); ?>
                <?php if ($session->get('role') === 'client'): ?>
                    <li class="nav-item"><a class="nav-link" href="/accueil">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/depot">Dépôt</a></li>
                    <li class="nav-item"><a class="nav-link" href="/retrait">Retrait</a></li>
                    <li class="nav-item"><a class="nav-link" href="/transfert">Transfert</a></li>
                    <li class="nav-item"><a class="nav-link" href="/historique">Historique</a></li>
                    <li class="nav-item"><a class="nav-link" href="/solde">Solde</a></li>
                <?php elseif ($session->get('role') === 'operator'): ?>
                    <li class="nav-item"><a class="nav-link" href="/operator/dashboard">Tableau de bord</a></li>
                    <li class="nav-item"><a class="nav-link" href="/prefixes">Préfixes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/types-operations">Types</a></li>
                    <li class="nav-item"><a class="nav-link" href="/baremes-frais">Barèmes</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Connexion client</a></li>
                    <li class="nav-item"><a class="nav-link" href="/operator/login">Connexion opérateur</a></li>
                <?php endif; ?>
            </ul>
            <?php if ($session->get('role')): ?>
                <span class="navbar-text text-white">
                    <?= esc($session->get('role') === 'client' ? 'Client ' . ($session->get('telephone') ?? '') : 'Opérateur ' . ($session->get('operator_name') ?? '')) ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container py-4">
