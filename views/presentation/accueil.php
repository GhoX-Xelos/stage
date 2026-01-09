<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise - Niak Niak Kadric</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="./public/css/accueil.css?v=<?= time() ?>">
</head>
<body>


<section class="grid1">
    <div class="block" id="carrousel"> 
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/image/carousel1/photo1.jpg" class="d-block w-100" alt="photo1">
                </div>
                <div class="carousel-item">
                    <img src="public/image/carousel1/photo2.jpg" class="d-block w-100" alt="photo2">
                </div>
                <div class="carousel-item">
                    <img src="public/image/carousel1/photo3.jpg" class="d-block w-100" alt="photo3">
                </div>
            </div>
        </div>
        <!-- Contenu superposé -->
        <div class="carousel-overlay">
            <h1 class="carousel-title">Niak Niak Kadric</h1>
            <a href="index.php?controleur=plante&action=index" class="carousel-btn">Découvrir nos plantes</a>
        </div>
    </div>
    <div class="block" id="presentation">
        <div class="presentation-content">
            <div class="presentation-header">
                <img src="./public/image/plante1.png" alt="Plante" class="presentation-img">
                <h2>À propos de Niak Niak Kadric</h2>
            </div>
            <p>
                Niak Niak Kadric est une entreprise spécialisée dans la production et la vente de plantes de qualité. 
                Passionnés par la nature et l'environnement, nous nous engageons à offrir à nos clients une large 
                sélection de plantes adaptées à tous les espaces et tous les besoins. Notre expertise et notre amour 
                pour le monde végétal nous permettent de vous accompagner dans vos projets de jardinage et de décoration.
            </p>
        </div>
    </div>
    <div class="block" id="objectif">
        <div class="objectif-img-wrapper">
            <img src="./public/image/accueil/plante-accueil1.jpg" alt="Objectifs" class="objectif-img">
            <h2>Nos<br>Objectifs</h2>
        </div>
        <div class="objectif-content">
            <div class="objectif-item">
                <h3>Objectif 1</h3>
                <p>Votre texte ici...</p>
            </div>
            <div class="objectif-item">
                <h3>Objectif 2</h3>
                <p>Votre texte ici...</p>
            </div>
        </div>
    </div>
</section>

<div class="divider-line"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>