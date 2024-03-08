

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/accueil.css">

    <title>Post-it App</title>
</head>
<body>

    <header>
        <?php
        require_once 'vue/Styles/header.php'
        ?>
    </header>
    

    <div class="container">
        <h1>Bienvenue au gestionnaire de posts-it</h1>
        <div class="post-it-wrapper">
            <h2>Post-its possédés</h2>
            <div class="post-it-container" id="post-it-container-owned">
            <div class="post-it-container" id="post-it-container-owned">
   
    <?php foreach ($allPostits as $postit){ ?>
        <div class="post-it">
                 <a href="index.php?page=PostitDetail&id=<?php echo $postit['IDPOSTIT']; ?>">
                    <h3><?php echo htmlspecialchars($postit['TITRE'], ENT_QUOTES, 'UTF-8'); ?></h3>
                 </a>
            <p><?php echo nl2br(htmlspecialchars($postit['LIBELLE'], ENT_QUOTES, 'UTF-8')); ?></p>
            <h4>Créé le: <?php echo htmlspecialchars($postit['DATEDECREATION'], ENT_QUOTES, 'UTF-8'); ?></h4>


        </div>
    <?php }; ?>
</div>
            </div>
        </div>
        <div class="post-it-wrapper">
            
    <h2>Post-its partagés</h2>
    <div class="post-it-container" id="post-it-container-shared">
        <?php foreach ($sharedPostits as $postit):?>
            <div class="post-it">
                <a href="index.php?page=PostitSharedDetail&id=<?php echo $postit['IDPOSTIT']; ?>">
                    <h3><?php echo htmlspecialchars($postit['TITRE'], ENT_QUOTES, 'UTF-8'); ?></h3>
                </a>
                <p><?php echo nl2br(htmlspecialchars($postit['LIBELLE'], ENT_QUOTES, 'UTF-8')); ?></p>
                <h4>Créé le: <?php echo htmlspecialchars($postit['DATEDECREATION'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <h4>Propriétaire: <?php echo htmlspecialchars($postit['PSEUDO']); ?></h4> 
            </div>
        <?php endforeach; ?>
    </div>
</div>

        </div>
    </div>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            alert('Vous avez été déconnecté(e) !');
            window.location.href = "/ProjetTER/src/index.php?page=login'";
        });

        document.getElementById('ajouterPostItBtn').addEventListener('click', function() {
            window.location.href = '/ProjetTER/src/vue/postitVue.php';
        });
    </script>

<footer>
        <?php
            require_once 'vue/Styles/footer.php'
        ?>
    </footer>
</body>
</html>
