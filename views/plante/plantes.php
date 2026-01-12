<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/plantes.css">
    <title>Nos Plantes</title>
    <style>
        .espece-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #000;
            font-size: 1.2rem;
            margin-bottom: 3px;
            padding: 3px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .espece-label:hover {
            background-color: #f0f0f0;
        }
        .espece-check {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid #4a4a4a;
            border-radius: 3px;
            position: relative;
            display: inline-block;
            vertical-align: middle;
            background: #fff;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }
        .espece-check:checked {
            background-color: #000 !important;
            border-color: #000 !important;
        }
        .espece-check:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            font-size: 12px;
            font-weight: 900;
            line-height: 1;
        }
    </style>
</head>
<body>
<?php include __DIR__ . '/../layout/header.php'; ?>

<section class="grid4" style ="margin-top: 65px;">
    <div class="block" id="titre-plante" style="background: #ffffff !important; color: #000000 !important; display: flex !important; align-items: center !important; justify-content: center !important;"> 
        <img src="./public/image/plante1.png" alt="Plante" style="height: 60px; width: auto; margin-right: 15px;">
        <h1 style="color: #000000 !important; font-weight: 900 !important; margin: 0;">Nos Plantes</h1>
        <img src="./public/image/plante3.png" alt="Plante" style="height: 60px; width: auto; margin-left: 15px;">
    </div>
    <div class="block" id="filtre" style="padding: 10px !important; overflow-y: visible; background: #fff !important; color: #000 !important;">
        <h3 style="margin: 0 0 8px 0; color: #2b4113; font-size: 1.4rem; padding-bottom: 6px; border-bottom: 2px solid #829633;">Filtrer par espèce</h3>
        <form method="GET" style="display: flex; flex-direction: column; gap: 4px;">
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
                <span style="font-size: 1.25rem; color: #000; font-weight: normal;">Toutes les espèces</span>
            </label>
            
            <?php foreach ($especes as $espece): ?>
                <label class="espece-label">
                    <input type="checkbox" name="espece[]" value="<?= htmlspecialchars($espece) ?>" class="espece-check"
                        <?= (isset($_GET['espece']) && in_array($espece, $_GET['espece'])) ? 'checked' : '' ?>>
                    <span style="font-size: 1.15rem; color: #000; font-weight: normal;"><?= htmlspecialchars($espece) ?></span>
                </label>
            <?php endforeach; ?>
            
            <button type="submit" style="margin-top: 15px; padding: 8px; background: #829633; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">Confirmer</button>
            
            <?php if (!empty($_GET['espece']) && !in_array('', $_GET['espece'])): ?>
                <a href="index.php?controleur=plante&action=plantes" style="display: block; padding: 8px; background: #ccc; color: #333; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem; text-align: center; text-decoration: none;">Réinitialiser</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="block" id="recherche" style="padding: 0 !important; background: transparent !important; color: inherit !important; display: flex !important; align-items: center !important; justify-content: center !important; width: 100% !important;">
        <form method="GET" style="width: 100%; display: flex; gap: 10px;">
            <input type="hidden" name="controleur" value="plante">
            <input type="hidden" name="action" value="plantes">
            <input type="text" name="search" placeholder="Rechercher une plante..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.9rem;">
            <button type="submit" style="padding: 10px 20px; background: #829633; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">Chercher</button>
        </form>
    </div>
    <div id="plantes" style="display: flex; flex-wrap: wrap; gap: 15px; padding: 20px; background: #f5f5f5; overflow-y: auto; grid-area: plantes;">
        <?php 
        if (!empty($plantes)): 
        ?>
            <?php foreach ($plantes as $plante): ?>
                <div class="plante-card" style="width: calc(20% - 12px); flex-basis: calc(20% - 12px); flex-shrink: 0; flex-grow: 0; min-height: 420px; background: white; box-shadow: 0 4px 8px rgba(0,0,0,0.15); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="padding: 12px 16px 6px 16px; box-sizing: border-box;">
                        <?php if (!empty($plante['image'])): ?>
                            <img src="./public/image/carousel1/photo3.jpg" alt="<?= htmlspecialchars($plante['nom']) ?>" class="plante-image" style="width: 100%; aspect-ratio: 1; object-fit: cover; display: block; border-radius: 8px;">
                        <?php else: ?>
                            <img src="./public/image/carousel1/photo3.jpg" alt="Image non disponible" class="plante-image" style="width: 100%; aspect-ratio: 1; object-fit: cover; display: block; border-radius: 8px;">
                        <?php endif; ?>
                    </div>
                    
                    <div class="plante-info" style="padding: 8px 16px 12px 16px; display: flex; flex-direction: column; flex: 1;">
                        <h3 class="plante-nom" style="margin: 0 0 8px 0; font-size: 1.1rem; color: #2b4113;"><?= htmlspecialchars($plante['nom']) ?></h3>
                        <p class="plante-espece" style="margin: 0 0 8px 0; font-size: 0.85rem;"><strong style="color: #829633;">Espèce:</strong> <?= htmlspecialchars($plante['espece']) ?></p>
                        
                        <?php if (!empty($plante['description'])): ?>
                            <p class="plante-description" style="margin: 0 0 10px 0; font-size: 0.8rem; line-height: 1.3; color: #555;">
                                <?= htmlspecialchars(substr($plante['description'], 0, 100)) ?>
                                <?= strlen($plante['description']) > 100 ? '...' : '' ?>
                            </p>
                        <?php endif; ?>
                        
                        <a href="index.php?controleur=plante&action=description&id=<?= $plante['id'] ?>" class="btn-voir-details" style="display: block; padding: 8px; background: #829633; color: white; text-decoration: none; text-align: center; border-radius: 4px; font-size: 0.85rem; font-weight: 600; margin-top: auto;">
                            Voir les détails
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-plantes" style="color: #666; text-align: center; padding: 40px; width: 100%;">Aucune plante disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>