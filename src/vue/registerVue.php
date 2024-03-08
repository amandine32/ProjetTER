<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue\styles\style.css">
</head>
<body>
<div class="register-container">
    <h2>Inscription</h2>
 <form id="registrationForm" action="controleur/RegisterControleur.php" method="post">

            <div class="left-column" style="text-align: center;">
                     <img src="vue/images/user.png" alt="logo" width="100" height="100">
             </div>

    <div >
        
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required placeholder = "Saisisez votre Nom" style="width: 250px;"><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required placeholder = "Saisisez votre Prénom" style="width: 250px;" ><br>

        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required placeholder = "Saisisez votre pseudo" style="width: 250px;"><br>

        <label for="dateDeNaissance">Date de naissance :</label>
        <input type="date" id="dateDeNaissance" name="dateDeNaissance" required style="width: 250px;"><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required placeholder = "votre adresse e-mail" style="width: 250px;" ><br>
       
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required placeholder="Au moins 6 caractères" style="width: 250px;"><br>
        <span id="motdepasseError" class="error"></span><br>

        <label for="confirm_motdepasse">Confirmer le mot de passe :</label>
        <input type="password" id="confirm_motdepasse" name="confirm_motdepasse" required placeholder="Confirmez votre mot de passe" style="width: 250px;"><br>
        <span id="confirm_motdepasseError" class="error"></span><br>

        <div align="center">
            <button type="submit">Inscription</button>
            <div> <br>
            <a href="index.php?page=login" class="text-center" >J'ai déjà un compte ?</a>

            </div>

        </div>

    </div>
</div>

<?php if (isset($_SESSION['account_created'])): ?>
<script>
    alert('');
</script>
<?php 
    unset($_SESSION['account_created']); 

endif; ?>


<script>
    // Fonction pour vérifier la validité du mot de passe et afficher les messages d'erreur
    function checkPassword(event) {
        var password = document.getElementById("motdepasse").value;
        var confirm_password = document.getElementById("confirm_motdepasse").value;
        var passwordError = document.getElementById("motdepasseError");
        var confirm_passwordError = document.getElementById("confirm_motdepasseError");

        if (password !== confirm_password || password.length < 6) {
            passwordError.innerHTML = "Le mot de passe doit faire au moins 6 caractères.";
            confirm_passwordError.innerHTML = "Les mots de passe ne correspondent pas.";
            event.preventDefault(); // Empêcher l'envoi du formulaire si les mots de passe ne sont pas valides
        } else {
            passwordError.innerHTML = "";
            confirm_passwordError.innerHTML = "";
        }
    }

    // Attacher la fonction checkPassword() à l'événement submit du formulaire
    document.getElementById("registrationForm").addEventListener("submit", checkPassword);
</script>



</body>
</html>
