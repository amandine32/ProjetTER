<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'welcome'; 

switch($page) {
    case 'login':
        include 'vue/loginVue.php';
        break;
    case 'register':
        include 'vue/registerVue.php';
        break;
    case 'PostitDetail':
        include 'controleur/PostitDetailController.php';
        break;
    case 'PostitSharedDetail': // Ajoutez ce cas pour gérer l'affichage des détails des post-its partagés
        include 'controleur/PostitSharedDetailControleur.php';
        break;
    case 'accueil': 
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            include 'controleur/AccueilControleur.php';
        } else {
            include 'vue/welcomeVue.php'; 
        }
        break;
    case 'supprimerPostit':
        include 'controleur/DeletePostitControleur.php';
        break;
    case 'welcome':
    default:
        include 'vue/welcomeVue.php';
        break;
}
?>
