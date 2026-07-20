<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Retrait</title>
</head>
<body>
    <h1>Effectuer un retrait</h1>
    <form method="post" action="/retrait">
        <label for="montant">Montant</label>
        <input type="number" name="montant" id="montant" required>
        <button type="submit">Valider</button>
    </form>
    <a href="/accueil">Retour</a>
</body>
</html>
