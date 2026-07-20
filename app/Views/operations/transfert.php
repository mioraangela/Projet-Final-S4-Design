<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Transfert</title>
</head>
<body>
    <h1>Effectuer un transfert</h1>
    <form method="post" action="/transfert">
        <label for="destinataire">Destinataire</label>
        <input type="text" name="destinataire" id="destinataire" required>
        <label for="montant">Montant</label>
        <input type="number" name="montant" id="montant" required>
        <button type="submit">Valider</button>
    </form>
    <a href="/accueil">Retour</a>
</body>
</html>
