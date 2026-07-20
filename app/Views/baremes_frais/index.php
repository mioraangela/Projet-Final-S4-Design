<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Barèmes de frais</title>
</head>
<body>
    <h1>Barèmes de frais</h1>
    <ul>
        <?php foreach ($baremes as $bareme): ?>
            <li>
                Type <?= esc($bareme['type_operation_id']) ?> :
                de <?= esc($bareme['montant_minimum']) ?> à <?= esc($bareme['montant_maximum']) ?>,
                frais = <?= esc($bareme['frais']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
