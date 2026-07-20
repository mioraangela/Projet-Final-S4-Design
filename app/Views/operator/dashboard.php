<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord opérateur</title>
</head>
<body>
    <h1>Tableau de bord opérateur</h1>
    <p>Bienvenue, <?= esc(session('operator_name')) ?>.</p>
    <ul>
        <li><a href="/prefixes">Gérer les préfixes</a></li>
        <li><a href="/types-operations">Gérer les types d'opérations</a></li>
        <li><a href="/baremes-frais">Gérer les barèmes de frais</a></li>
        <li><a href="/operator/gains">Voir les gains</a></li>
        <li><a href="/operator/comptes">Voir les comptes clients</a></li>
    </ul>
    <a href="/operator/logout">Déconnexion</a>
</body>
</html>
