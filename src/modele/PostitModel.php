<?php


class PostitModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:C:/laragon/www/ProjetTER/src/bdd/scrip.sqlite');
    }

    public function createPostit($titre, $libelle, $pseudo, $datedecreation, $iduser) {
        $sql = "INSERT INTO POSTIT (TITRE, LIBELLE, PSEUDO, DATEDECREATION, IDUSER)
                VALUES (:titre, :libelle, :pseudo, :datedecreation, :iduser)";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':datedecreation', $datedecreation);
        $stmt->bindParam(':iduser', $iduser);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erreur lors de l'enregistrement du post-it : " . $stmt->errorInfo()[2];
            return false;
        }
    }
    
    
    
    public function getAllUsers() {
        $sql = "SELECT IDUSER, PSEUDO FROM USER";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPartage($userId, $postitId) {
        $sql = "INSERT INTO Partage (IDUSER, IDPOSTIT)
                VALUES (:userId, :postitId)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postitId', $postitId);
        
        return $stmt->execute();
    }
    public function getLastInsertId() {
        return $this->db->lastInsertId();
    }

    
    public function getPostitsById($postitId) {
        $sql = "SELECT p.* FROM POSTIT p
                WHERE p.IDPOSTIT = :postitId ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':postitId', $postitId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getUserPostits($userId) {
        $sql = "SELECT p.* FROM POSTIT p
                WHERE p.IDUSER = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    public function getSharedUserById($postitid) {
        $sql = "SELECT u.* FROM USER u 
                INNER JOIN Partage pa ON u.IDUSER = pa.IDUSER
                WHERE pa.IDPOSTIT = :idPostit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':idPostit', $postitid);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function getSharedPostits($userId) {
        $sql = "SELECT p.* FROM POSTIT p 
                INNER JOIN Partage pa ON p.IDPOSTIT = pa.IDPOSTIT
                WHERE pa.IDUSER = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    
    
}
?>
