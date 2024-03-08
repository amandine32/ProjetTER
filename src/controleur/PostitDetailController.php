<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modele/PostitModel.php';
$postitModel = new PostitModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['titre'], $_POST['libelle'], $_POST['postitId'])) {
    $postId = $_POST['postitId'];
    $newTitle = $_POST['titre'];
    $newLibelle = $_POST['libelle'];

    $deleteSharedUser = $postitModel->deleteSharedUser($postId);
    $selectedUsers = isset($_POST['users']) ? $_POST['users'] : [];
    var_dump($selectedUsers);
    foreach ($selectedUsers as $userId) {
        $postitModel->createPartage($userId, $postId);
    }

    $result = $postitModel->updatePostit($postId, $newTitle, $newLibelle);

    if ($result) {
        
        header('Location: index.php?page=accueil');
        exit();
    } else {
      
        $errorMessage = "Erreur lors de la mise à jour du post-it.";
    }
}
$notSharedUser = $postitModel->getUserNotSharedUser($_GET['id']);






if (isset($_GET['id'])) {
    $postitId = $_GET['id'];
    $postitDetails = $postitModel->getPostitsById($postitId);
    $sharedUsers = $postitModel->getSharedUserById($postitId);

    require_once __DIR__ . '/../vue/PostitDetailVue.php';
} else {

    $errorMessage = "Aucun post-it spécifié.";

}
?>
