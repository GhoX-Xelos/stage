<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/description.css?v=<?php echo time(); ?>">
    <title><?= htmlspecialchars($plante['nom']) ?> - Détails</title>
</head>
<body>
<?php include __DIR__ . '/../layout/header.php'; ?>

    <section class="grid5" style="display: flex; flex-direction: row; gap: 2vw; height: 92vh; min-height: 520px;">
        <div class="block" id="image-plante" style="flex: 0 0 32%; max-width: 32%; max-height: 88vh; background: #fff; box-shadow: 0 0.4vh 1.2vh rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; overflow: hidden;">
            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plante['nom']) ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; max-height: 86vh;">
        </div>
        <div class="block" id="description-plante" style="flex: 1; background: #fff; box-shadow: 0 0.4vh 1.2vh rgba(0,0,0,0.1); display: flex; flex-direction: column; max-height: 88vh; overflow-y: auto;">
            <h1 style="text-align: center; font-size: 2.2rem; font-weight: 900; margin: 0 0 1.2rem 0; color: #000;"><?= htmlspecialchars($plante['nom']) ?></h1>
            <div class="espece-box" style="margin-bottom: 18px; padding: 13px; background: #f5f5f5; border-radius: 8px; font-size: 1.1rem;">
                <span style="font-weight: bold; color: #829633;">Espèce:</span> <span style="color: #333;"><?= htmlspecialchars($plante['espece']) ?></span>
            </div>
            <div>
                <h2 style="font-size: 1.25rem; color: #2b4113; margin: 0 0 12px 0;">Description</h2>
                <p class="description-text" style="font-size: 1rem; color: #555; line-height: 1.7; margin: 0 0 18px 0;"><?= nl2br(htmlspecialchars($plante['description'])) ?></p>
            </div>
            <div class="button-group" style="display: flex; gap: 10px; align-items: center; margin-bottom: 1.2rem;">
                <button style="padding: 12px 28px; background: #829633; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer;">Méthode d'entretien</button>
                <button class="download-btn" style="padding: 12px; display: flex; align-items: center; justify-content: center; background: #829633; color: white; border: none; border-radius: 6px;">
                    <img src="./public/image/download.svg?v=<?php echo time(); ?>" alt="Download" style="width: 22px; height: 22px; filter: brightness(0) invert(1);">
                </button>
            </div>
            <div class="back-link-box" style="display: flex; justify-content: flex-end; margin-top: auto; padding-top: 30px;">
                <a href="index.php?controleur=plante&action=plantes" class="back-link" style="display: inline-block; padding: 10px 22px; background: #829633; color: white; text-decoration: none; border-radius: 6px; font-size: 0.95rem; font-weight: 600;">← Retour aux plantes</a>
            </div>
        </div>
    </section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>