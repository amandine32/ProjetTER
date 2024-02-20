<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:C:/wamp64/www/pro2/ProjetTER/src/bdd/scrip.sqlite');
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
    public function getUserByMail($mail) {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE MAIL = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>