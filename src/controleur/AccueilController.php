<?php
session_start();
var_dump($_SESSION);
require_once 'modele/PostitModel.php';
$postitModel = new PostitModel();
$allPostits = $postitModel->getAllPostits();

$sharedPostits = []; 
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $sharedPostits = $postitModel->getSharedPostits($userId);
    var_dump($sharedPostits);
} else {
   
}

include 'vue/AccueilVue.php';
?>
