<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Préfixes</title>
</head>
<body>
    <h1>Liste des préfixes</h1>
    <form method="post" action="/prefixes/ajouter">
        <input type="text" name="prefixe" placeholder="Ajouter un préfixe" required>
        <button type="submit">Ajouter</button>
    </form>
    <ul>
        <?php foreach ($prefixes as $prefixe): ?>
            <li><?= esc($prefixe['prefixe']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
