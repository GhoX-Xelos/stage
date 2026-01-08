<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/auth.css">
</head>
<body>
    <?php include './views/layout/header.php'; ?>
    
    <div class="register-container">
        <a href="index.php" style="display: inline-block; margin-bottom: 20px; color: #2b4113; text-decoration: none; font-weight: 600;">← Retour à l'accueil</a>
        
        <h2>Créer un compte</h2>
        
        <?php if (!empty($message)): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="nom" placeholder="Jacobin" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="prenom" placeholder="Jacobin" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="tel">numero</label>
                <input type="tel" placeholder="01 01 01 01 01" id="tel" name="tel" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="plante@gmail.com" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" placeholder="Qko6+ed3!" id="mdp" name="mdp" required>
            </div>
            
            <div class="form-group">
                <label for="confirm_mdp">Confirmer le mot de passe</label>
                <input type="password" placeholder="Qko6+ed3!" id="confirm_mdp" name="confirm_mdp" required>
            </div>
            
            <div class="button-group">
                <button type="submit">Créer un compte</button>
            </div>
        </form>
        
        <div class="login-link">
            <p>Vous avez déjà un compte ?</p>
            <a href="index.php?controleur=user&action=login">Se connecter</a>
        </div>
    </div>
    
    <?php include './views/layout/footer.php'; ?>
</body>
</html>
