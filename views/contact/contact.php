<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/contact.css">
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
            <div style="padding: 2rem;">
                <h2 style="font-size: 1.8rem; color: #ffffff; margin-bottom: 25px;">Nos Informations</h2>
                
                <div style="margin-bottom: 30px;">
                    <h3 style="font-size: 1.3rem; color: #ffffff; margin-bottom: 15px;">Nous contacter</h3>
                    <?php if ($entreprise): ?>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📍 <?php echo trim(htmlspecialchars($entreprise['adresse'])) . ', ' . htmlspecialchars($entreprise['ville']) . ' ' . htmlspecialchars($entreprise['postal']); ?></p>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📧 <?php echo htmlspecialchars($entreprise['email']); ?></p>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📞 <?php echo htmlspecialchars($entreprise['tel']); ?></p>
                    <?php else: ?>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📍 Informations non disponibles</p>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📧 Informations non disponibles</p>
                        <p style="margin: 10px 0; font-size: 1.1rem; color: #f8f9fa;">📞 Informations non disponibles</p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <h3 style="font-size: 1.3rem; color: #ffffff; margin-bottom: 15px;">Nos Réseaux</h3>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <?php 
                        $icones = [
                            'icons8-facebook.svg',
                            'icons8-instagram.svg', 
                            'icons8-tiktok.svg'
                        ];
                        
                        foreach ($reseaux as $index => $reseau): 
                        ?>
                            <a href="<?php echo htmlspecialchars($reseau['url']); ?>" target="_blank" style="color: #f8f9fa; text-decoration: none; display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 6px; transition: all 0.3s ease;">
                                <img width="28" height="28" src="public/image/reseaux/<?php echo $icones[$index]; ?>" alt="<?php echo htmlspecialchars($reseau['nom']); ?>">
                                <span style="font-size: 1.1rem;"><?php echo htmlspecialchars($reseau['nom']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" id="formulaire">
            <div style="padding: 1.5rem;">
                <h1 style="margin: 0 0 30px 0; font-size: 3rem; color: #2b4113; font-weight: 900; text-align: center;">Contact</h1>
                <h2 style="font-size: 1.8rem; color: #2b4113; margin-bottom: 20px; text-align: center;">Envoyez-nous un message</h2>
                
                <form method="POST" action="index.php?controleur=contact&action=envoyer" style="display: flex; flex-direction: column; gap: 15px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <label for="nom" style="display: block; font-size: 1rem; color: #333; margin-bottom: 6px; font-weight: 600;">Nom</label>
                            <input type="text" id="nom" name="nom" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; box-sizing: border-box;">
                        </div>
                        <div>
                            <label for="prenom" style="display: block; font-size: 1rem; color: #333; margin-bottom: 6px; font-weight: 600;">Prénom</label>
                            <input type="text" id="prenom" name="prenom" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; box-sizing: border-box;">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" style="display: block; font-size: 1rem; color: #333; margin-bottom: 6px; font-weight: 600;">Email</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; box-sizing: border-box;">
                    </div>
                    
                    <div>
                        <label for="sujet" style="display: block; font-size: 1rem; color: #333; margin-bottom: 6px; font-weight: 600;">Sujet</label>
                        <input type="text" id="sujet" name="sujet" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; box-sizing: border-box;">
                    </div>
                    
                    <div>
                        <label for="message" style="display: block; font-size: 1rem; color: #333; margin-bottom: 6px; font-weight: 600;">Message</label>
                        <textarea id="message" name="message" required rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; box-sizing: border-box; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                    </div>
                    
                    <button type="submit" style="padding: 12px 30px; background: #829633; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; align-self: flex-start; transition: background 0.3s ease;">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
    
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>