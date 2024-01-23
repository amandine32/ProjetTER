<?php
try {

    $pdo = new PDO('sqlite:C:/Users/amand/OneDrive/Bureau/ProjetTER/scrip.sqlite');
    echo "Connexion réussie à la base de données SQLite.";

    // Testez en effectuant une requête simple (par exemple, lister les tables)
    $result = $pdo->query("SELECT name FROM sqlite_master WHERE type='table';");
    
    echo "\nListe des tables dans la base de données:\n";
    foreach ($result as $row) {
        echo $row['name'] . "\n";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
