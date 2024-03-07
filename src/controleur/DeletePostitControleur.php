<?php
require_once __DIR__ . '/../modele/PostitModel.php';

if (isset($_POST['postitId'])) {
    $postitId = $_POST['postitId'];
    

    $postitModel = new PostitModel();
    

    $success = $postitModel->deletePostit($postitId);
    
    if ($success) {

        header('Location: /ProjetTER/src/index.php?page=accueil');
        exit();
    } else {

        echo "Erreur lors de la suppression du post-it.";
    }
} else {

    echo "ID du post-it non fourni.";
}
?>
