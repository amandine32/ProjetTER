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


        $titre = $_POST['titre'];
        $libelle = $_POST['libelle'];
        $pseudo = $_POST['pseudo']; 
        $datedecreation = $_POST['datedecreation'];

        $selectedUsers = isset($_POST['users']) ? $_POST['users'] : [];

        try {
   
            $inserted = $postitModel->createPostit($titre, $libelle, $pseudo, $datedecreation, $userId);

            if ($inserted) {
                $lastInsertedPostitId = $postitModel->getLastInsertId();

                foreach ($selectedUsers as $userId) {
                    $postitModel->createPartage($userId, $lastInsertedPostitId);
                }

                header("Location: /ProjetTER/src/vue/AccueilVue.php");
                exit();
            } else {

                $errorMessage = "Erreur lors de l'enregistrement du post-it.";
            }
        } catch (Exception $e) {

            $errorMessage = "Une erreur s'est produite : " . $e->getMessage();
        }
    } else {
        $errorMessage = "Vous devez être connecté pour créer un post-it.";
    }
}


include_once('../vue/postitVue.php');
?>
