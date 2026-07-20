<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Types d'opérations</title>
</head>
<body>
    <h1>Types d'opérations</h1>
    <form method="post" action="/types-operations/ajouter">
        <input type="text" name="nom" placeholder="Nom du type" required>
        <button type="submit">Ajouter</button>
    </form>
    <ul>
        <?php foreach ($types as $type): ?>
            <li><?= esc($type['nom']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
