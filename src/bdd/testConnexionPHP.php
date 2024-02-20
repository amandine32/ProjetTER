<?php
try {

    $pdo = new PDO('sqlite:C:/wamp64/www/pro2/ProjetTER/src/bdd/scrip.sqlite');
    echo "Connexion réussie à la base de données SQLite.";

    
    $result = $pdo->query("SELECT name FROM sqlite_master WHERE type='table';");
    
    echo "\nListe des tables dans la base de données:\n";
    foreach ($result as $row) {
        echo $row['name'] . "\n";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
