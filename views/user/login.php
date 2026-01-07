<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/auth.css">
</head>
<body>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="login-container">
    <a href="index.php" style="display: inline-block; margin-bottom: 20px; color: #2b4113; text-decoration: none; font-weight: 600;">← Retour à l'accueil</a>
    <h2>Connexion</h2>

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

        <div class="button-group">
            <button type="submit">Continuer</button>
        </div>
    </form>

    <div class="signup-link">
        <p>Pas encore de compte ?</p>
        <a href="index.php?controleur=user&action=register">Créer un compte</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>

</body>
</html>
