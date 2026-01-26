<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/plantes.css?v=<?php echo time(); ?>">
    <title>Nos Plantes</title>
</head>
<body>
<?php include __DIR__ . '/../layout/header.php'; ?>

<section>
    <div id="titre-plante"> 
        <img src="./public/image/plante1.png" alt="Plante gauche" class="img-titre-plante img-gauche">
        <h1>Nos Plantes</h1>
        <img src="./public/image/plante3.png" alt="Plante droite" class="img-titre-plante img-droite">
    </div>
    <div class="plantes-section">
        <div class="filtres-column">
            <div class="block" id="filtre">
        <h3>Filtrer par espèce</h3>
        <form method="GET">
            <input type="hidden" name="controleur" value="plante">
            <input type="hidden" name="action" value="plantes">
            <?php if (isset($_GET['search'])): ?>
                <input type="hidden" name="search" value="<?= htmlspecialchars($_GET['search']) ?>">
            <?php endif; ?>
            
            <?php 
            // Utiliser la liste complète des espèces du contrôleur
            $especes = isset($toutesLesEspeces) ? $toutesLesEspeces : array_unique(array_filter(array_map(function($p) { return $p['espece']; }, $plantes)));
            sort($especes);
            ?>
            
            <label class="espece-label">
                <input type="checkbox" name="espece[]" value="" class="espece-check"> 
                <span class="espece-text">Toutes les espèces</span>
            </label>
            
            <?php foreach ($especes as $espece): ?>
                <label class="espece-label">
                    <input type="checkbox" name="espece[]" value="<?= htmlspecialchars($espece) ?>" class="espece-check"
                        <?= (isset($_GET['espece']) && in_array($espece, $_GET['espece'])) ? 'checked' : '' ?>>
                    <span class="espece-text espece-item"><?= htmlspecialchars($espece) ?></span>
                </label>
            <?php endforeach; ?>
            
            <button type="submit">Confirmer</button>
            
            <?php if (!empty($_GET['espece']) && !in_array('', $_GET['espece'])): ?>
                <a href="index.php?controleur=plante&action=plantes">Réinitialiser</a>
            <?php endif; ?>
            </form>
        </div>
        </div>
        
        <div class="plantes-right-column">
            <div class="block" id="recherche">
                <form method="GET">
                    <input type="hidden" name="controleur" value="plante">
                    <input type="hidden" name="action" value="plantes">
                    <input type="text" name="search" placeholder="Rechercher une plante..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button type="submit">Chercher</button>
                </form>
            </div>
            
            <div id="plantes">
        <?php 
        if (!empty($plantes)): 
        ?>
            <?php foreach ($plantes as $plante): ?>
                <div class="plante-card-wrapper">
                    <div class="plante-card-img-container">
                        <?php if (!empty($plante['image'])): ?>
                            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plante['nom']) ?>" class="plante-card-img">
                        <?php else: ?>
                            <img src="./public/image/carousel1/photo3.jpg" alt="Image non disponible" class="plante-card-img">
                        <?php endif; ?>
                    </div>
                    
                    <div class="plante-card-body">
                        <h3 class="plante-card-heading"><?= htmlspecialchars($plante['nom']) ?></h3>
                        <p class="plante-card-species"><strong>Espèce:</strong> <?= htmlspecialchars($plante['espece']) ?></p>
                        
                        <?php if (!empty($plante['description'])): ?>
                            <p class="plante-card-text">
                                <?= htmlspecialchars(substr($plante['description'], 0, 100)) ?>
                                <?= strlen($plante['description']) > 100 ? '...' : '' ?>
                            </p>
                        <?php endif; ?>
                        
                        <a href="index.php?controleur=plante&action=description&id=<?= $plante['id'] ?>" class="plante-card-btn">
                            Voir les détails
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-plantes">Aucune plante disponible pour le moment.</p>
        <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>