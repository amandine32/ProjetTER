<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/styles/style.css">
    <title>Réinitialiser le mot de passe</title>
</head>

<body>
    <div>
        <br><br>
        <div align = "center">

            <div class="lockscreen-image">
                <img src="vue/images/verrouiller.png" alt="User Image" width="100" height="100">
            </div>

            <h2>Reinitialisation de mot de passe </h2>
            <form action="index.php?page=resetPassword" method="post">
                <input type="email" name="mail" placeholder="Votre email" required>
                <select id="questionSec" name="questionSec" required>
                    <option value="option1">Quel est le prénom de votre meilleur ami ?</option>
                    <option value="option1">Quelle est votre ville de naissance?</option>
                </select><br>
                <input type="text" name="reponseSec" placeholder="Réponse à votre question secrète" required>
                <button type="submit">Vérifier</button>
            </form>
        </div>
    </div>
</body>
</html>
