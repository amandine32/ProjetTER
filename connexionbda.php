<?php
try {
    // Création ou ouverture de la base de données SQLite
    $pdo = new PDO('sqlite:C:/Users/amand/OneDrive/Bureau/ProjetTER/scrip.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création des tables si elles n'existent pas déjà
    $pdo->exec("CREATE TABLE IF NOT EXISTS USER (
                    IDUSER INTEGER PRIMARY KEY,
                    PSEUDO TEXT NOT NULL,
                    NOM TEXT NOT NULL,
                    PRENOM TEXT NOT NULL,
                    DATEDENAISSANCE TEXT NOT NULL,
                    MAIL TEXT NOT NULL,
                    MDP TEXT NOT NULL,
                    PHOTO TEXT
                )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS POSTIT (
                    IDPOSTIT INTEGER PRIMARY KEY,
                    DATEDECREATION TEXT NOT NULL,
                    TITRE TEXT NOT NULL,
                    PSEUDO TEXT NOT NULL,
                    IDUSER INTEGER,
                    LISTEDESUSERS TEXT,
                    FOREIGN KEY (IDUSER) REFERENCES USER(IDUSER)
                )");


    $stmt = $pdo->prepare("INSERT INTO USER (PSEUDO, NOM, PRENOM, DATEDENAISSANCE, MAIL, MDP, PHOTO) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute(['pseudo_user', 'Nom', 'Prénom', '2000-01-01', 'email@example.com', 'motdepasse', 'lien_photo']);

    // Exemple de récupération de données
    $stmt = $pdo->query("SELECT * FROM USER");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {

        print_r($user);
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
