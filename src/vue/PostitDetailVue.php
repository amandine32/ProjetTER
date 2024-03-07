<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/style2.css">
    <title>Ajout post-it</title>
</head>
<body>


    <?php if (isset($errorMessage)) : ?>
        <div style="color: red;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <div class="d1">
    <h1>New post-it:</h1>
        <div>
        <form action="../controleur/PostitDetailController.php" method="post" class="formulaire">

    <label for="titre">Titre :</label><br>
    <input value="<?php echo $postitDetails["TITRE"]?>" type="text" id="titre" name="titre" maxlength="150" required>
    
    <br>


    <label for="pseudo">Pseudo:</label><br>
    <input value="<?php echo $postitDetails["PSEUDO"]?>" type="text" id="pseudo" name="pseudo" maxlength="150" required>


    <label for="datedecreation">Date d'ajout :</label><br>
    <?php $datedecreation = date('d-m-Y'); ?>
    <input type="text" id="datedecreation" name="datedecreation" value="<?php echo $datedecreation; ?>" readonly>
    <br>


    <label for="users">Partager avec :</label><br>
    <?php foreach ($users as $user) : ?>
        <input type="checkbox" id="user_<?php echo $user['IDUSER']; ?>" name="users[]" value="<?php echo $user['IDUSER']; ?>">
        <label for="user_<?php echo $user['IDUSER']; ?>"><?php echo $user['PSEUDO']; ?></label><br>
    <?php endforeach; ?>

    <label for="libelle">Libellé:</label><br>
    <input type="text" id="libelle" name="libelle" class="libelle" required>
    <br><br>

    <input type="submit" value="Enregistrer">
</form>

        </div>
    </div>

</body>
</html>