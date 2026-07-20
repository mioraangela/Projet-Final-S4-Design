<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <p>Numéro : <?= esc($client['telephone'] ?? '') ?></p>
    <p>Solde : <?= esc($client['solde'] ?? 0) ?> Ar</p>
    <ul>
        <li><a href="/depot">Dépôt</a></li>
        <li><a href="/retrait">Retrait</a></li>
        <li><a href="/transfert">Transfert</a></li>
        <li><a href="/historique">Historique</a></li>
        <li><a href="/gains">Gains</a></li>
    </ul>
</body>
</html>
