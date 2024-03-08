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



<script>
   document.addEventListener('DOMContentLoaded', function () {
        autoType("Bienvenue sur votre espace de partage de pos-it !", 'autoType');
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

<footer>
        <div class="container"> 
            <p>&copy; 2024 NoteHub App. Tous droits réservés.</p>
        </div>
    </footer>
    

</body>
</html>

    
