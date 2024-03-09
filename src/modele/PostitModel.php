<?php
require_once 'config.php';

class PostitModel {
    private $db;

    public function __construct() {

        $this->db = new PDO('sqlite:' . DB_PATH);

    }
    public function createPostit($titre, $libelle, $datedecreation, $iduser) {
        $sql = "INSERT INTO POSTIT (TITRE, LIBELLE, DATEDECREATION, IDUSER)
                VALUES (:titre, :libelle, :datedecreation, :iduser)";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':libelle', $libelle);
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
        $sql = "SELECT p.* , u.PSEUDO FROM POSTIT p
                INNER JOIN user u ON u.IDUSER = p.IDUSER
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

    public function getUserNotSharedUser($postitid) {
        $sql = "SELECT * FROM USER u
                WHERE u.IDUSER not in(select pa.IDUSER from partage pa where pa.IDPOSTIT = :idPostit )";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':idPostit', $postitid);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function getSharedPostits($userId) {
        $sql = "SELECT p.*, u.pseudo FROM POSTIT p 
                INNER JOIN Partage pa ON p.IDPOSTIT = pa.IDPOSTIT
                INNER JOIN USER u ON u.IDUSER = p.IDUSER
                WHERE pa.IDUSER = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function deletePostit($postitId) {
        $sql = "DELETE FROM POSTIT WHERE IDPOSTIT = :postitId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':postitId', $postitId);
        return $stmt->execute();
    }
    
    public function updatePostit($postId, $newTitle, $newLibelle) {
        $sql = "UPDATE POSTIT SET TITRE = :newTitle, LIBELLE = :newLibelle WHERE IDPOSTIT = :postId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':newTitle', $newTitle);
        $stmt->bindParam(':newLibelle', $newLibelle);
        $stmt->bindParam(':postId', $postId);
        return $stmt->execute();
    }
    public function deleteSharedUser($postitId) {
        $sql = "DELETE FROM PARTAGE WHERE IDPOSTIT = :postitId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':postitId', $postitId);
        return $stmt->execute();
    }
    
}
?>
