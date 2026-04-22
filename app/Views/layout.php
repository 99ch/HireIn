<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'HireIn', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/assets/css/site.css">
</head>
<body>
<?php $activeNav = $activeNav ?? ''; ?>

<header class="site-header">
    <div class="site-shell header-inner">
        <a class="brand" href="/" aria-label="Retour a l'accueil">
            <span class="brand-icon" aria-hidden="true">╋╋</span>
            <span class="brand-text"><strong>Hire</strong><em>In</em></span>
        </a>

        <nav class="main-nav" aria-label="Navigation principale">
            <a class="<?= $activeNav === 'home' ? 'is-active' : '' ?>" href="/">Accueil</a>
            <a class="<?= $activeNav === 'profiles' ? 'is-active' : '' ?>" href="/profils">Profile</a>
            <a class="<?= $activeNav === 'about' ? 'is-active' : '' ?>" href="/a-propos">A propos</a>
        </nav>

        <div class="auth-links">
            <a class="btn-outline" href="/inscription">S'inscrire</a>
            <a class="btn-solid" href="/espace-entreprise">Se connecter</a>
        </div>
    </div>
</header>

<main>
    <?= $content ?>
</main>

<footer class="site-footer">
    <div class="site-shell footer-grid">
        <div>
            <p class="footer-icons">X &nbsp; O &nbsp; ▶ &nbsp; in</p>
            <p>2026 HireIn. Tous droits reserves. | Cotonou.Benin</p>
        </div>
        <div>
            <p class="footer-title">Politique de confidentialite</p>
        </div>
        <div>
            <p class="footer-title">Conditions d'utilisation</p>
            <p>Email : contact@gmail.com</p>
        </div>
        <div class="footer-right">
            <p>Tel : +229 00 00 00 00</p>
            <p class="footer-brand">HireIn</p>
        </div>
    </div>
</footer>
</body>
</html>
