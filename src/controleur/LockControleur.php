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
        // Récupérer le pseudo stocké dans la session
        $pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '';
    
        // Récupérer l'utilisateur en fonction du pseudo
        $user = $this->userModel->getUserByPseudo($pseudo);
    
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
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
        // Inclure la vue après avoir défini la variable de session message
        $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : ''; // Initialiser la variable de session message si elle n'existe pas
        require_once __DIR__ . '/../vue/LockVue.php';
            
            // Récupérer l'ID de l'utilisateur à partir de la session
            $idUser = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
        
            if ($idUser) {
                // Récupérer le pseudo de l'utilisateur en fonction de son ID
                $pseudo = $this->userModel->getPseudoById($idUser);
        
                // Initialiser la variable de session message si elle n'existe pas
                $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : '';
        
                // Inclure la vue après avoir défini le pseudo dans la session
                $_SESSION['pseudo'] = $pseudo;
                require_once __DIR__ . '/../vue/LockVue.php';
            } else {
                // Rediriger vers la page de connexion si l'ID de l'utilisateur n'est pas disponible dans la session
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

