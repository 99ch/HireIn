<section class="auth-page auth-bg-company">
    <?php $flash = $flash ?? null; ?>
    <?php $old = $old ?? []; ?>

    <div class="auth-card">
        <header class="auth-head">
            <h1>Formulaire d'inscription - Entreprise</h1>
            <p>Creez votre compte entreprise en remplissant le formulaire ci-dessous.</p>
        </header>

        <?php if (is_array($flash)): ?>
            <p class="flash-message flash-<?= htmlspecialchars((string) $flash['type'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars((string) $flash['message'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <div class="auth-tabs">
            <a href="/inscription">Profils</a>
            <span class="is-active">Entreprises</span>
        </div>

        <form class="form-grid" action="/inscription-entreprise" method="post">
            <label>Nom de l'entreprise<input type="text" name="company_name" placeholder="Value" value="<?= htmlspecialchars((string) ($old['company_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required></label>
            <label>Adresse precise (ville, quartier ...)<input type="text" name="city" placeholder="Value" value="<?= htmlspecialchars((string) ($old['city'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Nom du recruteur<input type="text" name="recruiter_name" placeholder="Value" value="<?= htmlspecialchars((string) ($old['recruiter_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required></label>
            <label>Secteur d'activite<input type="text" name="sector" placeholder="Value" value="<?= htmlspecialchars((string) ($old['sector'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Email<input type="email" name="email" placeholder="Value" value="<?= htmlspecialchars((string) ($old['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required></label>
            <label>Mot de passe<input type="password" name="password" placeholder="Value" required></label>
            <label>Numero de telephone<input type="text" name="phone" placeholder="Value" value="<?= htmlspecialchars((string) ($old['phone'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"></label>
            <label>Confirmer le mot de passe<input type="password" name="password_confirm" placeholder="Value" required></label>
            <label class="wide">Description de l'entreprise<textarea name="description" rows="3" placeholder="Value"><?= htmlspecialchars((string) ($old['description'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea></label>

            <div class="upload-row company-upload form-grid-full">
                <button class="upload-btn" type="button">⇩</button>
                <p class="upload-text">Inserez votre logo</p>
            </div>

            <p class="muted center form-grid-full">En cliquant sur “Soumettre“, vous acceptez nos Conditions d'utilisation et notre Politique de confidentialite.</p>
            <button class="btn-submit form-grid-full" type="submit">Soumettre</button>
        </form>
    </div>

    <div class="auth-bottom-text">
        <p>Vous avez deja un compte ?</p>
        <a href="/espace-entreprise">Connectez-vous</a>
    </div>

    <section class="pricing-wrap">
        <h2>Abonnement</h2>
        <div class="pricing-grid">
            <article class="price-card free">
                <h3>Free</h3>
                <p class="price">$50<span>/mo</span></p>
                <ul>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ul>
                <button type="button">Button</button>
            </article>

            <article class="price-card premium">
                <h3>Prenium</h3>
                <p class="price">$50<span>/mo</span></p>
                <ul>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ul>
                <button type="button">Button</button>
            </article>
        </div>
    </section>
</section>
