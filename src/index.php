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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/style1.css">
    <title>NoteHub App</title>
</head>
<body>

<div class="container1">
    <div class="left-column">
        <img src="vue/images/logosite.png" alt="logo">
    </div>

    <div class="right-column">
        <h1 id="autoType"></h1>
        <a href="index.php?page=login" class="button-link">Connexion</a>
        <p>Vous n'avez pas de compte ? Nous vous invitons à vous inscrire</p>
        <a href="index.php?page=register" class="button-link">Inscription</a>
    </div>
</div>


<!-- Autosaisie du texte de bienvenue -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
        autoType("Welcome to your creative space!", 'autoType');
    });

    function autoType(text, elementId) {
        var element = document.getElementById(elementId);
        var letters = text.split('');

        letters.forEach(function (letter, index) {
            setTimeout(function () {
                element.innerHTML += letter;
            }, index * 45);
        });
    }
</script>



</body>
</html>
<?php
            break;
    }
?>