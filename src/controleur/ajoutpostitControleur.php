<?php
session_start();
require_once 'C:/wamp64/www/pro2/ProjetTER/src/modele/PostitModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   /*  // Récupération du pseudo depuis la session
    $pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; */

    // Récupération des champs du formulaire
    $titre = $_POST['titre'];
    $libelle = $_POST['libelle'];
    $pseudo = $_POST['pseudo'];
    $datedecreation = $_POST['datedecreation'];

    // Création d'une instance de PostitModel
    $postitModel = new PostitModel();

    try {
        // Insertion du post-it dans la base de données
        $inserted = $postitModel->createPostit($titre, $libelle, $pseudo, $datedecreation);

        if ($inserted) {
            // Redirection vers index.php en cas de succès
            header("Location: /ProjetTER/src/index.php");
            exit();
        } else {
            // Reste sur la page d'ajout avec un message d'erreur
            $errorMessage = "Erreur lors de l'enregistrement du post-it.";
        }
    } catch (Exception $e) {
        $errorMessage = "Une erreur s'est produite : " . $e->getMessage();
    }
}
?>
