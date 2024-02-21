<?php
session_start();
require_once '../modele/PostitModel.php';
require_once '../vue/postitVue.php';

// Création d'une instance de PostitModel
$postitModel = new PostitModel();

$users = $postitModel->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des champs du formulaire
    $titre = $_POST['titre'];
    $libelle = $_POST['libelle'];
    $pseudo = $_POST['pseudo'];
    $datedecreation = $_POST['datedecreation'];

    // Récupération des utilisateurs sélectionnés
    $selectedUsers = isset($_POST['users']) ? $_POST['users'] : [];

    try {
        // Insertion du post-it dans la base de données
        $inserted = $postitModel->createPostit($titre, $libelle, $pseudo, $datedecreation);

        // Récupération de l'ID du dernier post-it inséré
        // Récupération de l'ID du dernier post-it inséré
        $lastInsertedPostitId = $postitModel->getLastInsertId();


        // Insertion des partages dans la base de données
        foreach ($selectedUsers as $userId) {
            $postitModel->createPartage($userId, $lastInsertedPostitId);
        }

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
