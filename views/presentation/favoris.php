<?php
// Récupération des plantes depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM plante LIMIT 3");
$plantes = $stmt->fetchAll();
?>

<section class="grid2">
    <div class="block banniere-full" id="banniere1">
        <img src="./public/image/carousel1/photo3.jpg" alt="Bannière">
    </div>
    
    <div class="favoris-row">
        <?php if (isset($plantes[0])): ?>
        <div class="block" id="favoris1">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[0]['nom']) ?>">
            <h3><?= htmlspecialchars($plantes[0]['nom']) ?></h3>
            <p class="espece-info"><strong>Espèce:</strong> <?= htmlspecialchars($plantes[0]['espece']) ?></p>
            <p class="description-info"><?= htmlspecialchars(substr($plantes[0]['description'], 0, 150)) ?><?= strlen($plantes[0]['description']) > 150 ? '...' : '' ?></p>
        </div>
        <?php endif; ?>
        
        <?php if (isset($plantes[1])): ?>
        <div class="block" id="favoris2">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[1]['nom']) ?>">
            <h3><?= htmlspecialchars($plantes[1]['nom']) ?></h3>
            <p class="espece-info"><strong>Espèce:</strong> <?= htmlspecialchars($plantes[1]['espece']) ?></p>
            <p class="description-info"><?= htmlspecialchars(substr($plantes[1]['description'], 0, 150)) ?><?= strlen($plantes[1]['description']) > 150 ? '...' : '' ?></p>
        </div>
        <?php endif; ?>
        
        <?php if (isset($plantes[2])): ?>
        <div class="block" id="favoris3">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[2]['nom']) ?>">
            <h3><?= htmlspecialchars($plantes[2]['nom']) ?></h3>
            <p class="espece-info"><strong>Espèce:</strong> <?= htmlspecialchars($plantes[2]['espece']) ?></p>
            <p class="description-info"><?= htmlspecialchars(substr($plantes[2]['description'], 0, 150)) ?><?= strlen($plantes[2]['description']) > 150 ? '...' : '' ?></p>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="block banniere-full" id="banniere2">
        <img src="./public/image/carousel1/photo3.jpg" alt="Bannière">
    </div>
</section>