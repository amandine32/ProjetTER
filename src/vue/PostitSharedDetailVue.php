<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/styles/style2.css">
    <title>Détail du Post-it Partagé</title>
</head>
<body>

<div class="detail-container">
    <h1>Détail du Post-it Partagé</h1>
    <p><strong>Titre:</strong> <?php echo htmlspecialchars($postitDetails['TITRE']); ?></p>
    <p><strong>Pseudo:</strong> <?php echo htmlspecialchars($postitDetails['PSEUDO']); ?></p>
    <p><strong>Date d'ajout:</strong> <?php echo htmlspecialchars($postitDetails['DATEDECREATION']); ?></p>
    <p><strong>Libellé:</strong> <?php echo nl2br(htmlspecialchars($postitDetails['LIBELLE'])); ?></p>
    <p><strong>Partagé avec:</strong></p>
    <ul>
        <?php foreach ($sharedUsers as $user): ?>
            <li><?php echo htmlspecialchars($user['PSEUDO']); ?></li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
