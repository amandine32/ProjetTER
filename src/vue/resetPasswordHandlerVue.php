<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Entrez un nouveau mot de passe</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
    <div class="reset-password-container">
        <h2>Entrez un nouveau mot de passe</h2>
        <form action="index.php?page=handleResetPassword" method="post">
            <input type="hidden" name="mail" value="<?php echo $_GET['mail']; ?>">
            <input type="password" name="newPassword" placeholder="Nouveau mot de passe" required>
            <input type="password" name="confirmNewPassword" placeholder="Confirmez le nouveau mot de passe" required>
            <div align="center">
                <button type="submit">Réinitialiser le mot de passe</button>
            </div>
        </form>
    </div>
</body>
</html>
