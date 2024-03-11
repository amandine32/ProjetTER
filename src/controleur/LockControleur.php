<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../modele/UserModel.php';

class LockControleur {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function lock($mdp) {

        $pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '';

        $user = $this->userModel->getUserByPseudo($pseudo);
    

        if ($user && password_verify($mdp, $user['MDP'])) {
            $_SESSION['logged_in'] = true; 
            header('Location: /ProjetTER/src/index.php?page=accueil');
            exit();
        } else {
            $_SESSION['message'] = "Connexion échouée. Mot de passe incorrect.";
            header('Location: /ProjetTER/src/index.php?page=verrouillage');
            exit();
        }
    }

    public function showLockForm() {

        $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : ''; 
        require_once __DIR__ . '/../vue/LockVue.php';
            

            $idUser = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
        
            if ($idUser) {

                $pseudo = $this->userModel->getPseudoById($idUser);
        

                $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : '';
        

                $_SESSION['pseudo'] = $pseudo;
                require_once __DIR__ . '/../vue/LockVue.php';
            } else {
               
                header('Location: /ProjetTER/src/index.php?page=login');
                exit();
            }
        }
    }

$lockControleur = new LockControleur();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mdp = $_POST['mdp'];
    $lockControleur->lock($mdp);
} else {
    $lockControleur->showLockForm();
}

?>