<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style2.css">
    <title>Ajout post-it</title>
</head>

<body>
    <?php include_once('../controleur/ajoutpostitControleur.php'); ?>


    <?php if (isset($errorMessage)): ?>
        <div style="color: red;">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <div class="d1">
        <h1>New post-it:</h1>
        <div>
            <form action="../controleur/ajoutpostitControleur.php" method="post" class="formulaire">

                <label for="titre">Titre :</label><br>
                <input type="text" id="titre" name="titre" maxlength="150" required>
                <br>


                <label for="pseudo">Pseudo:</label><br>
                <input type="text" id="pseudo" name="pseudo" class="pseudo" required><br>


                <label for="datedecreation">Date d'ajout :</label><br>
                <?php $datedecreation = date('d-m-Y'); ?>
                <input type="text" id="datedecreation" name="datedecreation" value="<?php echo $datedecreation; ?>"
                    readonly>
                <br>


                <label for="users">Partager avec :</label><br>
                <?php foreach ($users as $user): ?>
                    <input type="checkbox" id="user_<?php echo $user['IDUSER']; ?>" name="users[]"
                        value="<?php echo $user['IDUSER']; ?>">
                    <label for="user_<?php echo $user['IDUSER']; ?>">
                        <?php echo $user['PSEUDO']; ?>
                    </label><br>
                <?php endforeach; ?>

                <label for="libelle">Libellé:</label><br>
                <textarea id="libelle" name="libelle" class="libelle" required></textarea>
                <br><br>

                <input type="submit" value="Enregistrer">
            </form>

        </div>
    </div>

</body>

</html>