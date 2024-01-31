<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="controleur/loginControleur.php" method="post">
            <input type="text" name="mail" placeholder="Adresse e-mail" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
