<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/js/select2.min.js"></script>
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

                <label for="libelle">Libellé:</label><br>
                <textarea id="libelle" name="libelle" class="libelle" required></textarea>
                <br><br>

                <label for="user">Partager avec :</label><br>
                <select id="selected_users" name="selected_users[]" multiple style="width: 100%;">
                    <?php foreach ($users as $user): ?>
                        <?php if ($user['IDUSER'] != $_SESSION['userId']): ?>
                            <option value="<?php echo $user['IDUSER']; ?>">
                                <?php echo $user['PSEUDO']; ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                
                <input type="submit" value="Enregistrer">
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#selected_users').select2({
                placeholder: "Sélectionner des utilisateurs",
                allowClear: true
            });
        });
    </script>
</body>

</html>
