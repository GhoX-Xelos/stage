<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/style.css">
  <title>Document</title>
</head>
<body>
  


<?php
// Récupération des informations de contact depuis la base de données
require_once __DIR__ . '/../../models/Database.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM entreprise WHERE id = 1");
$entreprise = $stmt->fetch();

// Récupération des réseaux sociaux
$stmtReseaux = $pdo->query("SELECT * FROM reseaux ORDER BY id");
$reseaux = $stmtReseaux->fetchAll();
?>

<footer class="bg-dark text-light mt-0">
  <div class="container py-4">
    <div class="row">

      <!-- Navigation -->
      <div class="col-md-4 mb-3">
        <h5>Navigation</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Accueil</a></li>
          <li><a href="#" class="text-light text-decoration-none">Joueurs</a></li>
          <li><a href="#" class="text-light text-decoration-none">Coachs</a></li>
          <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Reseaux -->
      <div class="col-md-4 mb-3">
        <h5 class="mb-3">Nos Réseaux</h5>
        <div class="d-flex flex-column gap-2">
          <?php 
          $icones = [
            'icons8-facebook.svg',
            'icons8-instagram.svg', 
            'icons8-tiktok.svg'
          ];
          
          foreach ($reseaux as $index => $reseau): 
          ?>
            <a href="<?php echo htmlspecialchars($reseau['url']); ?>" target="_blank" class="text-light text-decoration-none d-flex align-items-center gap-2 py-2 px-3 rounded hover-social" style="transition: all 0.3s ease;">
              <img width="28" height="28" src="public/image/reseaux/<?php echo $icones[$index]; ?>" alt="<?php echo htmlspecialchars($reseau['nom']); ?>">
              <span><?php echo htmlspecialchars($reseau['nom']); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
        <style>
          .hover-social:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
          }
        </style>
      </div>

      <!-- Contact -->
      <div class="col-md-4 mb-3">
        <h5>Nous contacter</h5>
        <?php if ($entreprise): ?>
          <p class="small mb-1">📍 <?php echo trim(htmlspecialchars($entreprise['adresse'])) . ', ' . htmlspecialchars($entreprise['ville']) . ' ' . htmlspecialchars($entreprise['postal']); ?></p>
          <p class="small mb-1">📧 <?php echo htmlspecialchars($entreprise['email']); ?></p>
          <p class="small">📞 <?php echo htmlspecialchars($entreprise['tel']); ?></p>
        <?php else: ?>
          <p class="small mb-1">📍 Informations non disponibles</p>
          <p class="small mb-1">📧 Informations non disponibles</p>
          <p class="small">📞 Informations non disponibles</p>
        <?php endif; ?>
      </div>

    </div>

    <hr class="border-secondary">

    <!-- Copyright -->
    <div class="text-center small">
      © 2026 NiakNiak Kadrik – Tous droits réservés
    </div>
  </div>
</footer>

</body>
</html>
