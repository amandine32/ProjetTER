<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
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
            echo '<div class="welcome-message">Bienvenue sur la page d\'accueil</div>';

            echo '<form action="index.php" method="get" style="display: inline-block;">';
            echo '    <input type="hidden" name="page" value="login">';
            echo '    <button type="submit" class="home-button">Connexion</button>';
            echo '</form>';
            
            echo '<form action="index.php" method="get" style="display: inline-block;">';
            echo '    <input type="hidden" name="page" value="register">';
            echo '    <button type="submit" class="home-button">Inscription</button>';
            echo '</form>';
            break;
    }
    ?>
</body>
</html>
