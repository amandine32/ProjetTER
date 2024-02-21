<?php
require_once '../config.php';

class PostitModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:' . DB_PATH);
    }

    public function createPostit($titre, $libelle, $pseudo, $datedecreation) {
        $sql = "INSERT INTO POSTIT (TITRE, LIBELLE, PSEUDO, DATEDECREATION)
                VALUES (:titre, :libelle, :pseudo, :datedecreation)";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':datedecreation', $datedecreation);
    
        if ($stmt->execute()) {
            return true;
        } else {
            // Afficher le message d'erreur spécifique
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
    
    
    
}
?>