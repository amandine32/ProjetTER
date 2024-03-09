<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'welcome'; 

switch($page) {
    case 'login':
        include 'controleur/LoginControleur.php';
        break;
    case 'register':
        include 'controleur/registerControleur.php';
        break;
    case 'PostitDetail':
        include 'controleur/PostitDetailController.php';
        break;
    case 'PostitSharedDetail': 
        include 'controleur/PostitSharedDetailControleur.php';
        break;
    case 'AjoutPostit': 
        include 'controleur/ajoutpostitControleur.php';
        break;
    case 'APropos': 
        include 'controleur/AProposControleur.php';
        break;
    case 'accueil': 
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            include 'controleur/AccueilControleur.php';
        } else {
            include 'controleur/WelcomeControleur.php'; 
        }
        break;
    case 'supprimerPostit':
        include 'controleur/DeletePostitControleur.php';
        break;
    case 'welcome':
    default:
        include 'controleur/WelcomeControleur.php';
        break;
        
}
?>
