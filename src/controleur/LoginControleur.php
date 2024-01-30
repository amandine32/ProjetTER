<?php
session_start(); 
require_once 'C:/laragon/www/ProjetTER/src/modele/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($mail, $mdp) {
        $user = $this->userModel->getUserByMail($mail);
        if ($user && password_verify($mdp, $user['mdp'])) {
            $_SESSION['message'] = "Connexion réussie.";
            header(' Location : /ProjetTER/src/home.php'); 
        } else {
            $_SESSION['message'] = "Connexion échouée. Identifiants incorrects.";
            header('Location : /ProjetTER/src/home.php'); 
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail']; 
    $mdp = $_POST['mdp'];
    $loginController = new LoginController();
    $loginController->login($mail, $mdp);
}
?>
