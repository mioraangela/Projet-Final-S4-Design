<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion opérateur</title>
</head>
<body>
    <h1>Connexion opérateur</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= esc($error) ?></p>
    <?php endif; ?>
    <form method="post" action="/operator/login">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
