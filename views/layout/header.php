<header class="navbar" style="padding-right: 0.5%;"> 
    <a href="index.php" style="text-decoration: none; color: inherit;">
        <div class="logo">
            <img src="./public/image/logo.png" alt="Logo">
            <div class="logo-text">
                <div>Niak Niak</div>
                <div>Kadric</div>
            </div>
        </div>
    </a>

    <?php
        $userLoginIcon = './public/image/user-login.svg';
        $userAddIcon   = './public/image/user-add.svg';
    ?>

    <nav>
        <!-- Menu déroulant Accueil -->
        <div class="dropdown">
            <a href="index.php" class="dropdown-btn" style="text-decoration: none;">
                Accueil <span class="arrow">▼</span>
            </a>
            <div class="dropdown-menu">
                <a href="./views/presentation/entreprise.php">Entreprise</a>
                <a href="./views/presentation/favoris.php">Favoris</a>
            </div>
        </div>

        <a href="index.php?controleur=plante&action=plantes">Plantes</a>
        <a href="index.php?controleur=contact&action=index">Contact</a>

        <div class="user-actions">
            <?php if (!isset($_SESSION['email'])): ?>
                <a class="user-btn" href="index.php?controleur=user&action=login">
                    <img class="user-icon" src="<?= $userLoginIcon ?>" alt="Icône connexion">
                    <span>Login</span>
                </a>
                <a class="user-btn" href="index.php?controleur=user&action=register">
                    <img class="user-icon" src="<?= $userAddIcon ?>" alt="Icône création de compte">
                    <span>Sign in</span>
                </a>
            <?php else: ?>
                <span class="user">
                    <?= htmlspecialchars($_SESSION['email']) ?>
                </span>
                <a class="logout-btn" href="index.php?controleur=user&action=logout">Déconnexion</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<!-- JS pour le menu déroulant -->
<script>
    const dropdown = document.querySelector('.dropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Ouvrir le menu au hover sur toute la zone dropdown
    dropdown.addEventListener('mouseenter', function () {
        this.classList.add('active');
    });

    // Fermer le menu quand la souris quitte toute la zone
    dropdown.addEventListener('mouseleave', function () {
        this.classList.remove('active');
    });
</script>
