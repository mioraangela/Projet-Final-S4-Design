<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Solde</title>
</head>
<body>
    <h1>Solde du client</h1>
    <p>Numéro : <?= esc($client['telephone'] ?? '') ?></p>
    <p>Solde actuel : <?= esc($client['solde'] ?? 0) ?> Ar</p>
    <a href="/accueil">Retour</a>
</body>
</html>
