<!DOCTYPE html>
<html>
<head>
    <title>Réinitialiser le mot de passe</title>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
    <form action="index.php?page=resetPassword" method="post">
        <input type="email" name="mail" placeholder="Votre email" required>
        <input type="text" name="reponseSec" placeholder="Réponse à votre question secrète" required>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
