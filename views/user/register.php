<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="./public/css/reset.css?v=<?= time() ?>">
    <link rel="stylesheet" href="./public/css/auth.css?v=<?= time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css?v=<?= time() ?>">
</head>
<body>
    <?php include './views/layout/header.php'; ?>
    
    <div class="register-container">
        <a href="index.php" class="back-link">← Retour à l'accueil</a>
        
        <h2>Créer un compte</h2>
        
        <?php if (!empty($message)): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        
        <form method="POST">
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
