<?php
class UserModel {
    private $db; // Objet de connexion à la base de données

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getUser($username, $password) {
        // Code pour récupérer un utilisateur à partir de la base de données
    }

    public function createUser($userData) {
        // Code pour créer un nouvel utilisateur
    }
}
?>