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

    <section class="grid5" style="margin-top: 65px;">
        <div class="block" id="image-plante">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plante['nom']) ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
        </div>
        
        <div class="block" id="nom-plante">
            <h1 style="margin: 0; font-size: 2.5rem; color: #000000; font-weight: 900;"><?= htmlspecialchars($plante['nom']) ?></h1>
        </div>
        
        <div class="block" id="description-plante">
            <div style="margin-bottom: 20px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
                <p style="margin: 0; font-size: 1.2rem;"><strong style="color: #829633;">Espèce:</strong> <span style="color: #333;"><?= htmlspecialchars($plante['espece']) ?></span></p>
            </div>
            
            <div>
                <h2 style="font-size: 1.5rem; color: #2b4113; margin: 0 0 15px 0;">Description</h2>
                <p style="font-size: 1.1rem; color: #555; line-height: 1.8; margin: 0 0 25px 0;"><?= nl2br(htmlspecialchars($plante['description'])) ?></p>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <button style="padding: 16px 40px; background: #829633; color: white; border: none; border-radius: 6px; font-size: 1.1rem; font-weight: 600; cursor: pointer;">Méthode d'entretien</button>
                <button style="padding: 16px; background: #829633; color: white; border: none; border-radius: 6px; cursor: pointer; display: flex; align-items: center; justify-content: center;"><img src="./public/image/download.svg?v=<?php echo time(); ?>" alt="Download" style="width: 24px; height: 24px; filter: brightness(0) invert(1);"></button>
            </div>
            
            <div style="display: flex; justify-content: center; margin-top: auto; padding-top: 50px;">
                <a href="index.php?controleur=plante&action=plantes" style="display: inline-block; padding: 12px 30px; background: #829633; color: white; text-decoration: none; border-radius: 6px; font-size: 1rem; font-weight: 600;">← Retour aux plantes</a>
            </div>
        </div>
    </section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>