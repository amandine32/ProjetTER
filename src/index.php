<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) {
    case 'login':
        include 'vue/loginVue.php';
        break;
    case 'register':
        include 'vue/registerVue.php';
        break;
    default:
        echo "Bienvenue sur la page d'accueil";
        echo '<a href="index.php?page=login">Connexion</a>';
        echo '<a href="index.php?page=register">Inscription</a>';
        break;
}
?>
