<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/contact.css?v=<?php echo time(); ?>">
    <title>Contact</title>
</head>
<body>
<?php 
include __DIR__ . '/../layout/header.php';
// Affichage du message d'envoi si présent
if (isset($message_envoi)) {
    echo $message_envoi;
}

// Récupération des informations de contact depuis la base de données
require_once __DIR__ . '/../../models/Database.php';


$db = Database::getInstance();
$pdo = $db->getConnection();

// Récupération des informations de l'entreprise
$stmt = $pdo->query("SELECT * FROM entreprise WHERE id = 1");
$entreprise = $stmt ? $stmt->fetch() : null;

// Récupération des réseaux sociaux
$stmtReseaux = $pdo->query("SELECT * FROM reseaux ORDER BY id");
$reseaux = $stmtReseaux ? $stmtReseaux->fetchAll() : [];
?>

    <section id="contact-layout">
        <div id="contact-row">
            <div id="contact-bande">
                <div class="contact-infos">
                    <h3>Nos Informations</h3>
                    <div>
                        <?php if ($entreprise): ?>
                            <p>📍 <?php echo trim(htmlspecialchars($entreprise['adresse'])) . ', ' . htmlspecialchars($entreprise['ville']) . ' ' . htmlspecialchars($entreprise['postal']); ?></p>
                            <p>📧 <?php echo htmlspecialchars($entreprise['email']); ?></p>
                            <p>📞 <?php echo htmlspecialchars($entreprise['tel']); ?></p>
                        <?php else: ?>
                            <p>📍 Informations non disponibles</p>
                            <p>📧 Informations non disponibles</p>
                            <p>📞 Informations non disponibles</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contact-reseaux">
                    <h3>Nos Réseaux</h3>
                    <div class="reseaux-list">
                        <?php 
                        $icones = [
                            'icons8-facebook.svg',
                            'icons8-instagram.svg', 
                            'icons8-tiktok.svg'
                        ];
                        foreach ($reseaux as $index => $reseau): 
                        ?>
                            <a href="<?php echo htmlspecialchars($reseau['url']); ?>" target="_blank" class="reseau-link">
                                <img src="public/image/reseaux/<?php echo $icones[$index]; ?>" alt="<?php echo htmlspecialchars($reseau['nom']); ?>" class="reseau-icon">
                                <span><?php echo htmlspecialchars($reseau['nom']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div id="contact-form-row">
                <form method="POST" action="https://formspree.io/f/mqebyawo" id="contact-form">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required rows="6"></textarea>
                    </div>
                    <div class="form-btn-row">
                        <button type="submit" id="contact-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
<?php include __DIR__ . '/../layout/footer.php'; ?>

<script>
function resetContactForm() {
    var form = document.getElementById('contact-form');
    if(form) form.reset();
}
window.addEventListener('DOMContentLoaded', resetContactForm);
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        resetContactForm();
    }
});
</script>
</body>
</html>