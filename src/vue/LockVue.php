<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vue/styles/lock.css">
  <title> Verrouillage</title>

</head>
<body>

<div>
  <div align="center">
    <a href=""><b>Notehub</b></a>
  </div>

  <section>
    <div>
    <br><br><div align="center">
    <div class="lockscreen-image">
      <img src="vue/images/user.png" alt="User Image" width="100" height="100">
    </div>



    <br><div>
    <form action="index.php?page=verrouillage" method="post">
    <label for="pseudo">Vous etes connecté(e) en tant que :</label>
    <input type="text" id="pseudo" align="center" name="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; ?>" readonly><br>

        <br><input type="password" name="mdp" class="form-control" placeholder="mot de passe"><br>
        <?php
                            if (!empty($_SESSION['message'])) {
                            echo '<div class="notification">' . $_SESSION['message'] . '</div>';
                             unset($_SESSION['message']); }
        ?>

<div>
    Entrez votre mot de passe pour reprendre votre activité
  </div>

        <br><button type="submit">Se connecter</button>
        <div>
        </div>
      </div>
    </form>

  </div>

  <br><div align="center">
    Copyright &copy; 2024 <b><a href="" class="text-black">Notehub</a></b><br>
    All rights reserved
  </div>

    </div>

  </section>

    

</div>

</body>
</html>