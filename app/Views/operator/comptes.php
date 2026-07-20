<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Situation des comptes clients</title>
</head>
<body>
    <h1>Situation des comptes clients</h1>
    <ul>
        <?php foreach ($clients as $client): ?>
            <li>
                <?= esc($client['telephone']) ?> — solde : <?= esc($client['solde']) ?> Ar
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/operator/dashboard">Retour</a>
</body>
</html>
