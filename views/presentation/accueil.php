<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise - Niak Niak Kadric</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/accueil.css">
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
    <div class="block" id="presentation"> </div>
    <div class="block" id="objectif"> </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>