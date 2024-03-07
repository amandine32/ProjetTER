<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
<div class="register-container">
    <h2>Inscription</h2>
    <form action="controleur/RegisterControleur.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required><br>

        <label for="dateDeNaissance">Date de naissance :</label>
        <input type="date" id="dateDeNaissance" name="dateDeNaissance" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>

        <button type="submit">Inscription</button>
    </form>
</div>

<?php if (isset($_SESSION['account_created'])): ?>
<script>
    alert('Votre compte a été créé avec succès!');
</script>
<?php 
    unset($_SESSION['account_created']); 
endif; ?>

</body>
</html>
