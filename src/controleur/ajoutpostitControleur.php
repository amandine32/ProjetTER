<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modele/PostitModel.php';
require_once __DIR__ . '/../modele/UserModel.php';


// Création d'une instance de PostitModel
$postitModel = new PostitModel();
$userModel = new UserModel();

$userId = $_SESSION['userId']; 

$users = $postitModel->getAllUsers();
$userConnected = $userModel->getUserById($userId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['userId'])) {
        $titre = $_POST['titre'];
        $libelle = $_POST['libelle'];
        $datedecreation = $_POST['datedecreation'];

        $selectedUsers = isset($_POST['users']) ? $_POST['users'] : [];

        try {
   
            $inserted = $postitModel->createPostit($titre, $libelle, $datedecreation, $userId);

            if ($inserted) {
                $lastInsertedPostitId = $postitModel->getLastInsertId();

                foreach ($selectedUsers as $userId) {
                    $postitModel->createPartage($userId, $lastInsertedPostitId);
                }

                header('Location: /ProjetTER/src/index.php?page=accueil');
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


require_once __DIR__ . '/../vue/postitVue.php';
?>
