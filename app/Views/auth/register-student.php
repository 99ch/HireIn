<section class="auth-page auth-bg-student">
    <?php $flash = $flash ?? null; ?>
    <?php $old = $old ?? []; ?>

    <div class="auth-card">
        <header class="auth-head">
            <h1>Formulaire d'inscription</h1>
            <p>Creez votre profil en remplissant le formulaire ci-dessous.</p>
        </header>

        <?php if (is_array($flash)): ?>
            <p class="flash-message flash-<?= htmlspecialchars((string) $flash['type'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars((string) $flash['message'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <div class="auth-tabs">
            <span class="is-active">Profils</span>
            <a href="/inscription-entreprise">Entreprises</a>
        </div>

        <form class="form-grid" action="/inscription" method="post">
            <label>Nom complet<input type="text" name="fullname" placeholder="Value" value="<?= htmlspecialchars((string) ($old['fullname'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required></label>
            <label>Adresse precise (ville, quartier ...)<input type="text" name="city" placeholder="Value" value="<?= htmlspecialchars((string) ($old['city'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Niveau d'etude<input type="text" name="level" placeholder="Value" value="<?= htmlspecialchars((string) ($old['level'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Secteur d'activite recherche<input type="text" name="search_sector" placeholder="Value" value="<?= htmlspecialchars((string) ($old['search_sector'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Email<input type="email" name="email" placeholder="Value" value="<?= htmlspecialchars((string) ($old['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required></label>
            <label>Universite frequentee<input type="text" name="university" placeholder="Value" value="<?= htmlspecialchars((string) ($old['university'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Numero de telephone<input type="text" name="phone" placeholder="Value" value="<?= htmlspecialchars((string) ($old['phone'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Mot de passe<input type="password" name="password" placeholder="Value" required></label>
            <label>Competences<input type="text" name="skills" placeholder="Value" value="<?= htmlspecialchars((string) ($old['skills'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Confirmer le mot de passe<input type="password" name="password_confirm" placeholder="Value" required></label>

            <div class="upload-row form-grid-full">
                <div class="upload-box">
                    <div class="avatar-placeholder"></div>
                    <p>Photo de Profils</p>
                </div>
                <p class="upload-text">Inserez votre cv ici →</p>
                <button class="upload-btn" type="button">⇩</button>
            </div>

            <p class="muted center form-grid-full">En cliquant sur “Soumettre“, vous acceptez nos Conditions d'utilisation et notre Politique de confidentialite.</p>
            <button class="btn-submit form-grid-full" type="submit">Soumettre</button>
        </form>
    </div>

    <div class="auth-bottom-text">
        <p>Vous avez deja un compte ?</p>
        <a href="/espace-entreprise">Connectez-vous</a>
    </div>
</section>
