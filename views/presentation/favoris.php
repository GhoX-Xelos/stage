<?php
// Récupération des plantes depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM plante LIMIT 3");
$plantes = $stmt->fetchAll();
?>

<section class="favoris-container" id="favoris">    
    <div class="favoris-search-bar">
        <img src="./public/image/carousel1/photo3.jpg" alt="Barre de recherche">
        <div class="search-text-overlay">Nos favoris</div>
    </div>
    
    <!-- Grille de cartes -->
    <div class="favoris-cards-grid">
        <?php if (isset($plantes[0])): ?>
        <div class="favoris-card">
            <div class="favoris-card-image-wrapper">
                <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plantes[0]['nom']) ?>">
            </div>
            <div class="image-text-below">Espèce</div>
            <h3>Exemple</h3>
            <p class="card-text">Texte</p>
            <button class="card-btn">Voir plus</button>
        </div>
        <?php endif; ?>
        
        <?php if (isset($plantes[1])): ?>
        <div class="favoris-card">
            <div class="favoris-card-image-wrapper">
                <img src="./public/image/carousel1/photo2.jpg" alt="<?= htmlspecialchars($plantes[1]['nom']) ?>">
            </div>
            <div class="image-text-below">Espèce</div>
            <h3>Exemple</h3>
            <p class="card-text">Texte</p>
            <button class="card-btn">Voir plus</button>
        </div>
        <?php endif; ?>
        
        <?php if (isset($plantes[2])): ?>
        <div class="favoris-card">
            <div class="favoris-card-image-wrapper">
                <img src="./public/image/carousel1/photo1.jpg" alt="<?= htmlspecialchars($plantes[2]['nom']) ?>">
            </div>
            <div class="image-text-below">Espèce</div>
            <h3>Exemple</h3>
            <p class="card-text">Texte</p>
            <button class="card-btn">Voir plus</button>
        </div>
        <?php endif; ?>
    </div>
</section>