<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /ProjetTER/src/vue/LoginVue.php'); 
    exit;
}

require_once __DIR__ . '/../modele/PostitModel.php';
require_once __DIR__ . '/../modele/UserModel.php';

$postitModel = new PostitModel();
$allPostits = $postitModel->getUserPostits($_SESSION['userId']) ?: [];
$sharedPostits = isset($_SESSION['userId']) ? $postitModel->getSharedPostits($_SESSION['userId']) : [];




//include 'vue/AccueilVue.php';
require_once __DIR__ . '/../vue/AccueilVue.php';
?>