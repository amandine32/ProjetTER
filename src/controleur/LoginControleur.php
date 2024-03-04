<?php
session_start();
require_once '../modele/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($mail, $mdp) {
        $user = $this->userModel->getUserByMail($mail);

        if ($user && password_verify($mdp, $user['MDP'])) {
            $_SESSION['userId'] = $user['IDUSER'];
            $_SESSION['logged_in'] = true; // Ajoute cette ligne pour indiquer que l'utilisateur est connecté
            header('Location: /ProjetTER/src/vue/AccueilVue.php');
            exit();
        } else {
            $_SESSION['message'] = "Connexion échouée. Identifiants incorrects.";
            header('Location: /ProjetTER/src/vue/LoginVue.php');
            exit();
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
