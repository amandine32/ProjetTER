<?php
require_once 'config.php';
class UserModel {
    
    private $db;

    public function __construct() {

        $this->db = new PDO('sqlite:' . DB_PATH);

    }

    public function createUser($pseudo, $nom, $prenom, $dateDeNaissance, $mail, $mdp, $questionSec, $reponseSec) {
        $sql = "INSERT INTO USER (PSEUDO, NOM, PRENOM, DATEDENAISSANCE, MAIL, MDP, QUESTIONSEC, REPONSESEC)
                VALUES (:pseudo, :nom, :prenom, :dateDeNaissance, :mail, :mdp, :questionSec, :reponseSec)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':dateDeNaissance', $dateDeNaissance);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', $mdp); 
        $stmt->bindParam(':questionSec', $questionSec);
        $stmt->bindParam(':reponseSec', $reponseSec);

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
    public function getUserById($idUser) {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE IDUSER = :idUser");
        $stmt->bindParam(':idUser', $idUser);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function verifySecretQuestionAnswer($mail, $reponseSec) {
        $sql = "SELECT * FROM USER WHERE MAIL = :mail AND REPONSESEC = :reponseSec";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':reponseSec', $reponseSec);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUserPassword($mail, $newPassword) {
        $sql = "UPDATE USER SET MDP = :newPassword WHERE MAIL = :mail";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':mail', $mail);
        return $stmt->execute();
    }
    public function getUserByPseudo($pseudo) {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE PSEUDO = :pseudo");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getPseudoById($idUser) {
        $stmt = $this->db->prepare("SELECT PSEUDO FROM USER WHERE IDUSER = :idUser");
        $stmt->bindParam(':idUser', $idUser);
        $stmt->execute();
        $pseudo = $stmt->fetchColumn();
        return $pseudo;
    }
}
?>