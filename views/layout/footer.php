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
          <li><a href="index.php" class="text-light text-decoration-none nav-footer-link">Accueil</a></li>
          <li><a href="./views/presentation/entreprise.php" class="text-light text-decoration-none nav-footer-link">Entreprise</a></li>
          <li><a href="./views/presentation/favoris.php" class="text-light text-decoration-none nav-footer-link">Favoris</a></li>
          <li><a href="index.php?controleur=plante&action=plantes" class="text-light text-decoration-none nav-footer-link">Plantes</a></li>
          <li><a href="#" class="text-light text-decoration-none nav-footer-link">Contact</a></li>
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
              <img style="width: 1.5rem; height: 1.5rem;" src="public/image/reseaux/<?php echo $icones[$index]; ?>" alt="<?php echo htmlspecialchars($reseau['nom']); ?>">
              <span><?php echo htmlspecialchars($reseau['nom']); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
        <style>
          .hover-social:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
          }
          
          .nav-footer-link {
            display: inline-block;
            padding: 0.3rem 0;
            position: relative;
            transition: all 0.3s ease;
          }
          
          .nav-footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0.25rem;
            left: 0;
            background-color: #fff;
            transition: width 0.3s ease;
          }
          
          .nav-footer-link:hover {
            color: #ffffff !important;
            padding-left: 0.5rem;
          }
          
          .nav-footer-link:hover::after {
            width: 100%;
          }
          
          footer h5 {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
          }
          
          footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 3rem;
            height: 2px;
            background-color: #fff;
          }
          
          /* Responsive pour le footer */
          @media (max-width: 768px) {
            footer .container {
              padding: 1.5rem !important;
            }
            
            footer h5 {
              font-size: 1.1rem;
              margin-bottom: 0.6%;
            }
            
            footer p,
            footer li {
              font-size: 0.9rem;
            }
            
            footer .col-md-4 {
              margin-bottom: 1.5rem !important;
            }
          }
          
          @media (max-width: 480px) {
            footer .container {
              padding: 1rem !important;
            }
            
            footer h5 {
              font-size: 1rem;
              margin-bottom: 0.5%;
            }
            
            footer p,
            footer li {
              font-size: 0.85rem;
            }
            
            footer .col-md-4 {
              margin-bottom: 1.2rem !important;
            }
            
            footer .small {
              font-size: 0.8rem !important;
            }
          }
          
          @media (max-width: 360px) {
            footer .container {
              padding: 0.8rem !important;
            }
            
            footer h5 {
              font-size: 0.95rem;
            }
            
            footer p,
            footer li {
              font-size: 0.8rem;
            }
            
            footer .small {
              font-size: 0.75rem !important;
            }
          }
        </style>
      </div>

      <!-- Contact -->
      <div class="col-md-4 mb-3">
        <h5>Nous contacter</h5>
        <?php if ($entreprise): ?>
          <p class="small mb-3">📍 <?php echo trim(htmlspecialchars($entreprise['adresse'])) . ', ' . htmlspecialchars($entreprise['ville']) . ' ' . htmlspecialchars($entreprise['postal']); ?></p>
          <p class="small mb-3">📧 <?php echo htmlspecialchars($entreprise['email']); ?></p>
          <p class="small">📞 <?php echo htmlspecialchars($entreprise['tel']); ?></p>
        <?php else: ?>
          <p class="small mb-3">📍 Informations non disponibles</p>
          <p class="small mb-3">📧 Informations non disponibles</p>
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

<!-- Bouton retour en haut -->
<button id="scrollTopBtn" class="scroll-top-btn" title="Retour en haut">
  <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <polyline points="18 15 12 9 6 15"></polyline>
  </svg>
</button>

<style>
  .scroll-top-btn {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 3rem;
    height: 3rem;
    background-color: #829633;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    z-index: 1000;
  }
  
  .scroll-top-btn:hover {
    background-color: #9db042;
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }
  
  .scroll-top-btn.show {
    display: flex;
    animation: fadeIn 0.3s ease;
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(8px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* Responsive pour le bouton retour en haut */
  @media (max-width: 768px) {
    .scroll-top-btn {
      bottom: 1.5rem;
      right: 1.5rem;
      width: 2.75rem;
      height: 2.75rem;
    }
    
    .scroll-top-btn svg {
      width: 1.3rem;
      height: 1.3rem;
    }
  }
  
  @media (max-width: 480px) {
    .scroll-top-btn {
      bottom: 1rem;
      right: 1rem;
      width: 2.5rem;
      height: 2.5rem;
    }
    
    .scroll-top-btn svg {
      width: 1.2rem;
      height: 1.2rem;
    }
  }
</style>

<script>
  // Bouton retour en haut
  const scrollTopBtn = document.getElementById('scrollTopBtn');
  
  // Afficher/masquer le bouton selon le scroll
  window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
      scrollTopBtn.classList.add('show');
    } else {
      scrollTopBtn.classList.remove('show');
    }
  });
  
  // Remonter en haut au clic
  scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
</script>

</body>
</html>
