<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modele/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $email = $_POST['email'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);


    $userModel = new UserModel();

    $inserted = $userModel->createUser($pseudo, $nom, $prenom, $dateDeNaissance, $email, $motdepasse);


    if ($inserted) {
        $_SESSION['account_created'] = true;
        header('Location: /ProjetTER/src/index.php?page=login');
        exit();
    } else {
        $_SESSION['error_message'] = "Erreur lors de la création du compte.";

    }
}


if ($_SERVER['REQUEST_METHOD'] != 'POST' || isset($_SESSION['error_message'])) {
    require_once __DIR__ . '/../vue/registerVue.php';
}
?>
