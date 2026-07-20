<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique</title>
</head>
<body>
    <h1>Historique des opérations</h1>
    <ul>
        <?php foreach ($operations as $operation): ?>
            <li>
                <?= esc($operation['date_operation']) ?> -
                Montant : <?= esc($operation['montant']) ?> -
                Frais : <?= esc($operation['frais']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/accueil">Retour</a>
</body>
</html>
