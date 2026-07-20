<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dépôt</title>
</head>
<body>
    <h1>Effectuer un dépôt</h1>
    <form method="post" action="/depot">
        <label for="montant">Montant</label>
        <input type="number" name="montant" id="montant" required>
        <button type="submit">Valider</button>
    </form>
    <a href="/accueil">Retour</a>
</body>
</html>
