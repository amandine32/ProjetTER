<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modele/PostitModel.php';
require_once __DIR__ . '/../vue/postitVue.php';

// Création d'une instance de PostitModel
$postitModel = new PostitModel();

$users = $postitModel->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId']; 

        // Récupération des champs du formulaire
        $titre = $_POST['titre'];
        $libelle = $_POST['libelle'];
        $pseudo = $_POST['pseudo']; // Note: Vous pourriez vouloir utiliser l'IDUSER pour récupérer le pseudo de l'utilisateur
        $datedecreation = $_POST['datedecreation'];

        // Récupération des utilisateurs sélectionnés pour le partage
        $selectedUsers = isset($_POST['users']) ? $_POST['users'] : [];

        try {
            // Insertion du post-it dans la base de données avec l'IDUSER
            $inserted = $postitModel->createPostit($titre, $libelle, $pseudo, $datedecreation, $userId);

            if ($inserted) {
                // Récupération de l'ID du dernier post-it inséré
                $lastInsertedPostitId = $postitModel->getLastInsertId();

                // Insertion des partages dans la base de données
                foreach ($selectedUsers as $userId) {
                    $postitModel->createPartage($userId, $lastInsertedPostitId);
                }

                // Redirection vers la page d'accueil en cas de succès
                header("Location: /ProjetTER/src/vue/AccueilVue.php");
                exit();
            } else {
                // Affichage d'un message d'erreur si l'insertion a échoué
                $errorMessage = "Erreur lors de l'enregistrement du post-it.";
            }
        } catch (Exception $e) {
            // Gestion des exceptions
            $errorMessage = "Une erreur s'est produite : " . $e->getMessage();
        }
    } else {
        $errorMessage = "Vous devez être connecté pour créer un post-it.";
    }
}

// Inclusion de la vue pour afficher le formulaire ou les messages d'erreur
include_once('../vue/postitVue.php');
?>
