<?php
// Récupération des plantes depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

// Récupérer les favoris avec leur plante associée
$stmt = $pdo->query("SELECT favoris.id AS favoris_id, plante.* FROM favoris JOIN plante ON favoris.plante_id = plante.id");
$favoris = $stmt->fetchAll();
?>

<section class="favoris-container" id="favoris">    
    <div class="favoris-search-bar">
        <img src="./public/image/carousel1/photo3.jpg" alt="Barre de recherche">
        <div class="search-text-overlay">Nos favoris</div>
    </div>
    
    <!-- Grille de cartes -->
    <div class="favoris-cards-grid">
        <?php foreach ($favoris as $fav): ?>
        <div class="favoris-card">
            <div class="favoris-card-image-wrapper">
                <img src="<?= htmlspecialchars($fav['image']) ?>" alt="<?= htmlspecialchars($fav['nom']) ?>">
            </div>
            <div class="image-text-below"><?= htmlspecialchars($fav['espece']) ?></div>
            <h3><?= htmlspecialchars($fav['nom']) ?></h3>
            <p class="card-text"><?= htmlspecialchars($fav['description']) ?></p>
            <button class="card-btn">Voir plus</button>
        </div>
        <?php endforeach; ?>
    </div>
</section>