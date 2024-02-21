<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/style2.css">
    <title>Ajout post-it</title>
</head>
<body>
<?php include_once('../controleur/ajoutpostitControleur.php'); ?>


   <!-- Erreur à afficher si l'enregistrement du postit échoue -->
    <?php if (isset($errorMessage)) : ?>
        <div style="color: red;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <div class="d1">
    <h1>New post-it:</h1>
        <div>
            <form action="../controleur/ajoutpostitControleur.php" method="post" class="formulaire">
                <!-- Champ pour le titre -->
                <label for="titre">Titre :</label><br>
                <input type="text" id="titre" name="titre" maxlength="150" required>
                <br>

                  <!-- Champ pour le pseudo -->
                <label for="pseudo"> Pseudo:</label><br>
                <input type="text" id="pseudo" name="pseudo" class="pseudo" required><br>

                <!-- Champ pour la date d'ajout -->
                <label for="datedecreation">Date d'ajout :</label><br>
                <?php $datedecreation = date('d-m-Y'); ?>
                <input type="text" id="datedecreation" name="datedecreation" value="<?php echo $datedecreation; ?>" readonly>
                <br>
                <label for="users">Partager avec :</label><br>
                
                <select name="users[]" id="users" multiple>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user['IDUSER']; ?>"><?php echo $user['PSEUDO']; ?></option>
                    <?php endforeach; ?>
                </select>



                <!-- Champ pour le libellé du post-it -->
                <label for="libelle"> Libellé:</label><br>
                <input type="text" id="libelle" name="libelle" class="libelle" required>
                <br><br>

                <!-- Bouton d'enregistrement -->
                <input type="submit" value="Enregistrer">
            </form>
        </div>
    </div>

</body>
</html>