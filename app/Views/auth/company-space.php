<section class="site-shell page-section">
    <?php $flash = $flash ?? null; ?>
    <?php $authUser = $authUser ?? null; ?>

    <?php if (is_array($flash)): ?>
        <p class="flash-message flash-<?= htmlspecialchars((string) $flash['type'], ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars((string) $flash['message'], ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <?php if (!is_array($authUser)): ?>
        <section class="login-panel">
            <h1>Connectez - vous a votre compte</h1>

            <form action="/connexion" method="post" class="login-form">
                <label>Email de l'entreprise<input type="email" name="email" placeholder="Value" required></label>
                <label>Mot de passe<input type="password" name="password" placeholder="Value" required></label>
                <button class="btn-submit" type="submit">Se connecter</button>
            </form>
        </section>
    <?php endif; ?>

    <article class="dashboard-card">
        <header>
            <div>
                <h2>Nom de l'entreprise</h2>
                <p><?= htmlspecialchars((string) ($authUser['fullname'] ?? 'FU'), ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <span>⋮</span>
        </header>

        <div class="dashboard-media"></div>

        <div class="dashboard-copy">
            <h3>Poste</h3>
            <p>Subtitle</p>
            <p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
        </div>

        <div class="dashboard-actions">
            <button class="btn-outline" type="button">Publier une offre</button>
            <button class="btn-accent" type="button">Modifier</button>

            <?php if (is_array($authUser)): ?>
                <form action="/deconnexion" method="post">
                    <button class="btn-outline" type="submit">Deconnexion</button>
                </form>
            <?php endif; ?>
        </div>
    </article>

    <aside class="notification-sticky">
        <div class="bubble"></div>
        <p>Notification</p>
    </aside>
</section>
