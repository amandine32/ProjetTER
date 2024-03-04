<?php
session_start();


if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php?page=welcome");
    exit();
}


$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'login':
        include 'vue/login_vue.php'; // Inclus la vue de connexion
        include 'controleur/LoginController.php'; // Inclus le contrôleur de connexion
        break;
    case 'register':
        include 'vue/register_vue.php'; // Inclus la vue d'inscription
        include 'controleur/RegisterController.php'; // Inclus le contrôleur d'inscription
        break;
    default:
        include 'controleur/AccueilController.php'; // Inclus le contrôleur de la page d'accueil
        break;
}

?>
