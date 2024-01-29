<?php
require_once 'C:/laragon/www/ProjetTER/src/modele/UserModel.php';

class RegisterController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel(/* Paramètres de connexion à la base de données */);
    }

    public function register($userData) {
        // Logique d'inscription
    }
}
?>