<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['userId'])) {
    header('Location: /ProjetTER/src/index.php?page=welcome'); 
    exit();
}

require_once __DIR__ . '/../modele/PostitModel.php';
$postitModel = new PostitModel();

if (isset($_GET['id'])) {
    $postitId = $_GET['id'];
    $postitDetails = $postitModel->getPostitsById($postitId);
    $sharedUsers = $postitModel->getSharedUserById($postitId);

    require_once __DIR__ . '/../vue/PostitSharedDetailVue.php';
} else {
    echo "ID du post-it manquant.";
}
?>
