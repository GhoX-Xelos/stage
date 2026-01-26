<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/contact.css?v=<?php echo time(); ?>">
    <title>Contact</title>
</head>
<body>
<?php 
include __DIR__ . '/../layout/header.php';

// Récupération des informations de contact depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM entreprise WHERE id = 1");
$entreprise = $stmt->fetch();

// Récupération des réseaux sociaux
$stmtReseaux = $pdo->query("SELECT * FROM reseaux ORDER BY id");
$reseaux = $stmtReseaux->fetchAll();
?>
    <section class="grid6">
        <div class="block" id="informations">
            <h2>Nos Informations</h2>
            
            <div class="contact-section">
                <h3>Nous contacter</h3>
                <div class="contact-info">
                    <?php if ($entreprise): ?>
                        <p>📍 <?php echo trim(htmlspecialchars($entreprise['adresse'])) . ', ' . htmlspecialchars($entreprise['ville']) . ' ' . htmlspecialchars($entreprise['postal']); ?></p>
                        <p>📧 <?php echo htmlspecialchars($entreprise['email']); ?></p>
                        <p>📞 <?php echo htmlspecialchars($entreprise['tel']); ?></p>
                    <?php else: ?>
                        <p>📍 Informations non disponibles</p>
                        <p>📧 Informations non disponibles</p>
                        <p>📞 Informations non disponibles</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div>
                <h3>Nos Réseaux</h3>
                <div class="reseaux-container">
                    <?php 
                    $icones = [
                        'icons8-facebook.svg',
                        'icons8-instagram.svg', 
                        'icons8-tiktok.svg'
                    ];
                    
                    foreach ($reseaux as $index => $reseau): 
                    ?>
                        <a href="<?php echo htmlspecialchars($reseau['url']); ?>" target="_blank" class="reseau-link">
                            <img src="public/image/reseaux/<?php echo $icones[$index]; ?>" alt="<?php echo htmlspecialchars($reseau['nom']); ?>">
                            <span><?php echo htmlspecialchars($reseau['nom']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="block" id="formulaire">
            <div id="formulaire-content">
                <h1>Contact</h1>
                <h2>Envoyez-nous un message</h2>
                
                <form method="POST" action="index.php?controleur=contact&action=envoyer">
                    <div id="formulaire-columns">
                        <div>
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div>
                        <label for="sujet">Sujet</label>
                        <input type="text" id="sujet" name="sujet" required>
                    </div>
                    
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required rows="3"></textarea>
                    </div>
                    
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
    
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>