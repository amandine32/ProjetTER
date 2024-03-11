<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/styles/style.css">

    <script src="vue/validation.js"></script>
</head>

<body>
    <div class="register-container">
        <h2>Inscription</h2>

        <form id="registrationForm" action="index.php?page=register" method="post" onsubmit="return validateForm()">

            <div class="left-column" style="text-align: center;">
                <img src="vue/images/user.png" alt="logo" width="100" height="100">
            </div>

            <div>

                <label for="nom">Nom * :</label>
                <input type="text" id="nom" name="nom" placeholder="Saisisez votre Nom" style="width: 250px;">
                <span id="nomError" class="error"></span><br>

                <label for="prenom">Prénom * :</label>
                <input type="text" id="prenom" name="prenom"  placeholder="Saisisez votre Prénom" style="width: 250px;"><br>
                <span id="prenomError" class="error"></span><br>

                <label for="pseudo">Pseudo * :</label>
                <input type="text" id="pseudo" name="pseudo"  placeholder="Saisisez votre pseudo"
                    style="width: 250px;"><br>
                <span id="pseudoError" class="error"></span><br>

                <label for="dateDeNaissance">Date de naissance * :</label>
                <input type="date" id="dateDeNaissance" name="dateDeNaissance" style="width: 250px;"><br>
                <span id="dateDeNaissanceError" class="error"></span><br>

                <label for="email">Email * :</label>
                <input type="email" id="email" name="email" placeholder="votre adresse e-mail"
                    style="width: 250px;"><br>
                <span id="emailError" class="error"></span><br>

                <label for="motdepasse">Mot de passe * :</label>
                <input type="password" id="motdepasse" name="motdepasse" placeholder="Au moins 6 caractères"
                    style="width: 250px;"><br>
                <span id="motdepasseError" class="error"></span><br>

                <br><label for="confirm_motdepasse">Confirmer le mot de passe * :</label>
                <input type="password" id="confirm_motdepasse" name="confirm_motdepasse"
                    placeholder="Confirmez votre mot de passe" style="width: 250px;"><br>
                <span id="confirm_motdepasseError" class="error"></span><br>

                <label for="questionSec">Question secrète :</label>
                <select id="questionSec" name="questionSec">
                    <option value="option1">Quel est le prénom de votre meilleur ami?</option>
                    <option value="option1">Quelle est votre ville de naissance?</option>


                </select><br>

                <br><label for="reponseSec">Réponse à la question secrète :</label><br>
                <input type="text" id="reponseSec" name="reponseSec" placeholder="Votre réponse"><br>

                <div align="center">
                    <button type="submit">Inscription</button>
                    <div> <br>
                        <a href="index.php?page=login" class="text-center">J'ai déjà un compte ?</a>

                    </div>

                </div>
            </div>
        </form>
    </div>

    <?php if (isset($_SESSION['account_created'])): ?>
        <script>
            alert('');
        </script>
        <?php
        unset($_SESSION['account_created']);

    endif; ?>


    <script>
        // Attacher la fonction checkPassword() à l'événement submit du formulaire
        document.getElementById("registrationForm").addEventListener("submit", checkPassword);
    </script>



</body>

</html>