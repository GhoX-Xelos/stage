<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/description.css?v=<?php echo time(); ?>">
    <title><?= htmlspecialchars($plante['nom']) ?> - Détails</title>
</head>
<body>
<?php include __DIR__ . '/../layout/header.php'; ?>

    <section class="grid5">
        <div class="block" id="image-plante">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plante['nom']) ?>">
        </div>
        
        <div class="block" id="nom-plante">
            <h1><?= htmlspecialchars($plante['nom']) ?></h1>
        </div>
        
        <div class="block" id="description-plante">
            <div class="espece-box">
                <p><strong>Espèce:</strong> <span><?= htmlspecialchars($plante['espece']) ?></span></p>
            </div>
            
            <div>
                <h2>Description</h2>
                <p class="description-text"><?= nl2br(htmlspecialchars($plante['description'])) ?></p>
            </div>
            
            <div class="button-group">
                <button>Méthode d'entretien</button>
                <button class="download-btn">
                    <img src="./public/image/download.svg?v=<?php echo time(); ?>" alt="Download">
                </button>
            </div>
            
            <div class="back-link-box">
                <a href="index.php?controleur=plante&action=plantes" class="back-link">← Retour aux plantes</a>
            </div>
        </div>
    </section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>