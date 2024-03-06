<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../modele/UserModel.php';
//require_once("modele/UserModel.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $email = $_POST['email'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

    // Création d'une instance de UserModel
    $userModel = new UserModel();
    // Insertion de l'utilisateur dans la base de données
    $userModel->createUser($pseudo, $nom, $prenom, $dateDeNaissance, $email, $motdepasse);
}
?>