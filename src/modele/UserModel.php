<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:C:/laragon/www/ProjetTER/src/bdd/scrip.sqlite');
    }

    public function createUser($pseudo, $nom, $prenom, $dateDeNaissance, $mail, $mdp = null) {
        $sql = "INSERT INTO USER (PSEUDO, NOM, PRENOM, DATEDENAISSANCE, MAIL, MDP)
                VALUES (:pseudo, :nom, :prenom, :dateDeNaissance, :mail, :mdp)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':dateDeNaissance', $dateDeNaissance);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', $mdp); 

        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
            return false;
        }

        return true;
    }
}
?>