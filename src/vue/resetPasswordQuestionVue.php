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
        <select id="questionSec" name="questionSec" required>
        <option value="option1">Quel est le prénom de votre meilleur ami?</option>
        <option value="option1">Quelle est votre ville de naissance?</option>
        <input type="text" name="reponseSec" placeholder="Réponse à votre question secrète" required>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
