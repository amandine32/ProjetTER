<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modele/PostitModel.php';

$postitModel = new PostitModel();
$allPostits = $postitModel->getAllPostits() ?: [];
$sharedPostits = isset($_SESSION['userId']) ? $postitModel->getSharedPostits($_SESSION['userId']) : [];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/accueil.css">

    <title>Post-it App</title>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logosite.png" alt="logo">
            </div>
            <nav>
                <button id="ajouterPostItBtn">Ajouter un post-it</button>
                <button id="logoutBtn">Déconnexion</button>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1>Bienvenue au gestionnaire de posts-it</h1>
        <div class="post-it-wrapper">
            <h2>Post-its possédés</h2>
            <div class="post-it-container" id="post-it-container-owned">
            <div class="post-it-container" id="post-it-container-owned">
   
    <?php foreach ($allPostits as $postit): ?>
        <div class="post-it">
            <h3><?php echo htmlspecialchars($postit['TITRE'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($postit['LIBELLE'], ENT_QUOTES, 'UTF-8')); ?></p>

        </div>
    <?php endforeach; ?>
</div>
            </div>
        </div>
        <div class="post-it-wrapper">
            <h2>Post-its partagés</h2>
            <div class="post-it-container" id="post-it-container-shared">
            <div class="post-it-container" id="post-it-container-shared">
    <?php foreach ($sharedPostits as $postit): ?>
        <div class="post-it">
            <h3><?php echo htmlspecialchars($postit['TITRE'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($postit['LIBELLE'], ENT_QUOTES, 'UTF-8')); ?></p>
        </div>
    <?php endforeach; ?>
</div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            alert('Vous avez été déconnecté !');
            window.location.href = "/ProjetTER/src/vue/loginVue.php";
        });

        document.getElementById('ajouterPostItBtn').addEventListener('click', function() {
            window.location.href = '/ProjetTER/src/vue/postitVue.php';
        });
    </script>

    <footer>
        <div class="social-icons">
            <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
        </div>
        <p>&copy; 2024 NoteHub App. Tous droits réservés.</p>
    </footer>
</body>
</html>
