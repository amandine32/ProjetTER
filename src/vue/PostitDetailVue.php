<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/style2.css">
    <title>Ajout post-it</title>
</head>

<body>


    <?php if (isset($errorMessage)): ?>
        <div style="color: red;">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <div class="d1">
        <h1>New post-it:</h1>
        <div>
        <form action="index.php?page=PostitDetail" method="post" class="formulaire">
    <input type="hidden" name="postitId" value="<?php echo $postitDetails['IDPOSTIT']; ?>">

    <label for="titre">Titre :</label><br>
    <input value="<?php echo $postitDetails["TITRE"] ?>" type="text" id="titre" name="titre" maxlength="150" required>
    <br>

    <label for="libelle">Libellé:</label><br>
    <input type="text" id="libelle" name="libelle" value="<?php echo $postitDetails["LIBELLE"]; ?>">
    <br><br>

    <label for="pseudo">Pseudo:</label><br>
    <input value="<?php echo $postitDetails["PSEUDO"] ?>" type="text" id="pseudo" name="pseudo" maxlength="150" required>
    <br>

    <label for="datedecreation">Date d'ajout :</label><br>
    <input type="text" id="datedecreation" name="datedecreation" value="<?php echo date('d-m-Y'); ?>" readonly>
    <br>

    <label for="users">Partager avec :</label><br>
    <?php foreach ($sharedUsers as $user): ?>
    <input type="checkbox" checked id="user_<?php echo $user['IDUSER']; ?>" name="users[]" value="<?php echo $user['IDUSER']; ?>">
    <label for="user_<?php echo $user['IDUSER']; ?>"><?php echo $user['PSEUDO']; ?></label><br>
    <?php endforeach; ?>
    <?php foreach ($notSharedUser as $user): ?><?php if ($user['IDUSER'] != $_SESSION['userId']){?>
    <input type="checkbox" id="user_<?php echo $user['IDUSER']; ?>" name="users[]" value="<?php echo $user['IDUSER']; ?>">
    <label for="user_<?php echo $user['IDUSER']; ?>"><?php echo $user['PSEUDO']; ?></label><br>
    <?php } ?>
    <?php endforeach; ?>



    <input type="submit" value="Enregistrer">
</form>

<form action="controleur/DeletePostitControleur.php" method="post" class="formulaire">
                <input type="hidden" name="postitId" value="<?php echo $postitDetails['IDPOSTIT']; ?>">
                <input type="submit" value="Supprimer">
            </form>



        </div>
    </div>

</body>

</html>