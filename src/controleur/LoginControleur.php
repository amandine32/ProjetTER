<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../modele/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($mail, $mdp) {
        $user = $this->userModel->getUserByMail($mail);

        if ($user && password_verify($mdp, $user['MDP'])) {
            $_SESSION['userId'] = $user['IDUSER'];
            $_SESSION['logged_in'] = true; 
            header('Location: /ProjetTER/src/index.php?page=accueil');
            exit();
        } else {
            $_SESSION['message'] = "Connexion échouée. Identifiants incorrects.";
            header('Location: /ProjetTER/src/index.php?page=login');
            exit();
        }
    }

    public function showLoginForm() {
        // Inclure la vue après avoir défini la variable de session message
        $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : ''; // Initialiser la variable de session message si elle n'existe pas
        require_once __DIR__ . '/../vue/loginVue.php';
    }
}

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $loginController->login($mail, $mdp);
} else {
    $loginController->showLoginForm();
}
?>
