<!DOCTYPE html>
<html>
<head>
    <title>Réinitialiser le mot de passe</title>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
<div>
    <br><br><div align="center">
    <div class="lockscreen-image">
      <img src="vue/images/verrouiller.png" alt="User Image" width="100" height="100">
    </div>

    <form action="index.php?page=resetPassword" method="post">
        <input type="email" name="mail" placeholder="Votre email" required>
        <select id="questionSec" name="questionSec" required> <br>
            <option value="option1">Quel est le prénom de votre meilleur ami ?</option>
            <option value="option1">Quelle est votre ville de naissance?</option>

         <input type="text" name="reponseSec" placeholder="Réponse à votre question secrète" required>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
