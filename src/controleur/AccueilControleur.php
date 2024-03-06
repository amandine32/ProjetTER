<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /chemin/vers/loginVue.php'); 
    exit;
}

require_once __DIR__ . '/../modele/PostitModel.php';
require_once __DIR__ . '/../modele/UserModel.php';

$postitModel = new PostitModel();
$allPostits = $postitModel->getAllPostits() ?: [];
$sharedPostits = isset($_SESSION['userId']) ? $postitModel->getSharedPostits($_SESSION['userId']) : [];

$allPostits = $postitModel->getAllPostits();

$sharedPostits = []; 
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $sharedPostits = $postitModel->getSharedPostits($userId);
    var_dump($sharedPostits);
} else {
   
}

//include 'vue/AccueilVue.php';
require_once __DIR__ . '/../vue/AccueilVue.php';
?>