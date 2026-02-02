<header class="navbar"> 
    <a href="index.php" class="navbar-logo-link">
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
            <a href="index.php" class="dropdown-btn">
                Accueil <span class="arrow">▼</span>
            </a>
            <div class="dropdown-menu">
                <a href="index.php#favoris">Favoris</a>
                <a href="index.php#entreprise">Entreprise</a>

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

    // Scroll centré pour les ancres #entreprise et #favoris
    document.querySelectorAll('a[href="index.php#entreprise"], a[href="index.php#favoris"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            const hash = this.getAttribute('href').split('#')[1];
            const target = document.getElementById(hash);
            if (target) {
                e.preventDefault();
                const rect = target.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const offset = rect.top + scrollTop;
                let center = offset - (window.innerHeight/2) + (target.offsetHeight/2);
                    // Décalage spécifique pour chaque ancre
                    if (hash === 'favoris') {
                        center -= 32;
                    } else if (hash === 'entreprise') {
                        center -= 28;
                    }
                window.scrollTo({ top: center, behavior: 'smooth' });
                // Met à jour l'URL sans recharger
                history.replaceState(null, '', 'index.php#' + hash);
            }
        });
    });
</script>
