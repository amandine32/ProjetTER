<!-- Formulaire d'inscription -->
<form action="registerControleur.php" method="post">
    <!-- Champ pour le nom -->
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <!-- Champ pour le prénom -->
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <!-- Champ pour le pseudo -->
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br>

    <!-- Champ pour l'email -->
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <!-- Champ pour le mot de passe -->
    <label for="motdepasse">Mot de passe :</label>
    <input type="password" id="motdepasse" name="motdepasse" required><br>

    <!-- Bouton d'inscription -->
    <button type="submit">Inscription</button>
</form>
