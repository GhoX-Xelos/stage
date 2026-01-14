<?php
// Récupération des plantes depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM plante LIMIT 3");
$plantes = $stmt->fetchAll();
?>

<section class="grid2">
    <div class="block" id="banniere1">
        <img src="./public/image/carousel1/photo3.jpg" alt="Bannière" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    
    <?php if (isset($plantes[0])): ?>
    <div class="block" id="favoris1" style="padding: 1.5rem; background: white !important; color: black !important;">
        <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[0]['nom']) ?>" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; margin-bottom: 1rem;">
        <h3 style="margin: 0 0 0.5rem 0; font-size: 1.5rem; color: #2b4113; font-weight: bold;"><?= htmlspecialchars($plantes[0]['nom']) ?></h3>
        <p style="margin: 0 0 0.75rem 0; font-size: 1.1rem;"><strong style="color: #829633;">Espèce:</strong> <?= htmlspecialchars($plantes[0]['espece']) ?></p>
        <p style="margin: 0; font-size: 1rem; color: #555; line-height: 1.5;"><?= htmlspecialchars(substr($plantes[0]['description'], 0, 150)) ?><?= strlen($plantes[0]['description']) > 150 ? '...' : '' ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (isset($plantes[1])): ?>
    <div class="block" id="favoris2" style="padding: 1.5rem; background: white !important; color: black !important;">
        <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[1]['nom']) ?>" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; margin-bottom: 1rem;">
        <h3 style="margin: 0 0 0.5rem 0; font-size: 1.5rem; color: #2b4113; font-weight: bold;"><?= htmlspecialchars($plantes[1]['nom']) ?></h3>
        <p style="margin: 0 0 0.75rem 0; font-size: 1.1rem;"><strong style="color: #829633;">Espèce:</strong> <?= htmlspecialchars($plantes[1]['espece']) ?></p>
        <p style="margin: 0; font-size: 1rem; color: #555; line-height: 1.5;"><?= htmlspecialchars(substr($plantes[1]['description'], 0, 150)) ?><?= strlen($plantes[1]['description']) > 150 ? '...' : '' ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (isset($plantes[2])): ?>
    <div class="block" id="favoris3" style="padding: 1.5rem; background: white !important; color: black !important;">
        <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[2]['nom']) ?>" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; margin-bottom: 1rem;">
        <h3 style="margin: 0 0 0.5rem 0; font-size: 1.5rem; color: #2b4113; font-weight: bold;"><?= htmlspecialchars($plantes[2]['nom']) ?></h3>
        <p style="margin: 0 0 0.75rem 0; font-size: 1.1rem;"><strong style="color: #829633;">Espèce:</strong> <?= htmlspecialchars($plantes[2]['espece']) ?></p>
        <p style="margin: 0; font-size: 1rem; color: #555; line-height: 1.5;"><?= htmlspecialchars(substr($plantes[2]['description'], 0, 150)) ?><?= strlen($plantes[2]['description']) > 150 ? '...' : '' ?></p>
    </div>
    <?php endif; ?>
    
    <div class="block" id="banniere2">
        <img src="./public/image/carousel1/photo3.jpg" alt="Bannière" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
</section>