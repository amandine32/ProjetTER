<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="vue/styles/style.css">
</head>
<body>
    <div class="login-container">
            <h2>Connexion</h2>
            <div  style="text-align: center;">
                     <img src="vue/images/user.png" alt="logo" width="100" height="100">
             </div>
     
                <form action="controleur/loginControleur.php" method="post">

                        <input type="text" name="mail" placeholder="Adresse e-mail" required>
                        <input type="password" name="mdp" placeholder="Mot de passe" required>
                       
            
                         <?php
                            if (!empty($_SESSION['message'])) {
                            echo '<div class="notification">' . $_SESSION['message'] . '</div>';
                             unset($_SESSION['message']);
                                }
                        ?>

                    <div align="center">
                        <button type="submit">Se connecter</button>
                        <a href="index.php?page=register" class="text-center">Je n'ai pas de compte ?</a>
                    </div>
                    <div align="right"><a href="#">Mot de passe oublié ... </a> </div>
                </form>

            </div>
    </div>


</body>
</html>
