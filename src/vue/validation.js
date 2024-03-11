function validateForm() {
    if (!validateNom()) return false;
    if (!validatePrenom()) return false;
    if (!validatePseudo()) return false;
    if (!validateDateDeNaissance()) return false;
    if (!validateEmail()) return false;
    return true;
}

function validateNom() {
    var nom = document.getElementById("nom").value;
    if (nom.trim() == "") {
        document.getElementById("nomError").innerHTML = "Veuillez saisir votre Nom.";
        return false;
    } else {
        document.getElementById("nomError").innerHTML = "";
        return true;
    }
}

function validatePrenom() {
    var prenom = document.getElementById("prenom").value;
    if (prenom.trim() == "") {
        document.getElementById("prenomError").innerHTML = "Veuillez saisir votre Prénom.";
        return false;
    } else {
        document.getElementById("prenomError").innerHTML = "";
        return true;
    }
}

function validatePseudo() {
    var pseudo = document.getElementById("pseudo").value;
    if (pseudo.trim() == "") {
        document.getElementById("pseudoError").innerHTML = "Veuillez saisir votre Pseudo.";
        return false;
    } else {
        document.getElementById("pseudoError").innerHTML = "";
        return true;
    }
}

function validateDateDeNaissance() {
    var dateDeNaissance = document.getElementById("dateDeNaissance").value;
    if (dateDeNaissance.trim() == "") {
        document.getElementById("dateDeNaissanceError").innerHTML = "Veuillez saisir votre Date de naissance.";
        return false;
    } else {
        document.getElementById("dateDeNaissanceError").innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    if (email.trim() == "") {
        document.getElementById("emailError").innerHTML = "Veuillez remplir le champ Email.";
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
        return true;
    }
}



// Fonction pour vérifier la validité du mot de passe et afficher les messages d'erreur
function checkPassword(event) {
    var password = document.getElementById("motdepasse").value;
    var confirm_password = document.getElementById("confirm_motdepasse").value;
    var passwordError = document.getElementById("motdepasseError");
    var confirm_passwordError = document.getElementById("confirm_motdepasseError");

    if (password !== confirm_password || password.length < 6) {
        passwordError.innerHTML = "Le mot de passe doit faire au moins 6 caractères.";
        confirm_passwordError.innerHTML = "Les mots de passe ne correspondent pas.";
        event.preventDefault(); // Empêcher l'envoi du formulaire si les mots de passe ne sont pas valides
    } else {
        passwordError.innerHTML = "";
        confirm_passwordError.innerHTML = "";
    }
}



