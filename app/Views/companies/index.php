<section class="companies-section">
    <div class="site-shell">
        <h1 class="section-title center light">Annuaire des entreprises</h1>
        <p class="section-subtitle center light">Decouvrez le catalogue des entreprises</p>

        <div class="company-grid">
            <?php foreach (($companies ?? []) as $company): ?>
                <article class="company-logo-card">
                    <span><?= htmlspecialchars((string) $company, ENT_QUOTES, 'UTF-8') ?></span>
                </article>
            <?php endforeach; ?>
        </div>

        <article class="company-focus">
            <div>
                <h2>Information sur l'entreprise</h2>
                <ul>
                    <li>Nom de l'entreprise :</li>
                    <li>Localisation :</li>
                    <li>Secteur d'activite :</li>
                    <li>Entreprise d'accueil :</li>
                    <li>Telephone :</li>
                    <li>Email :</li>
                    <li>Site web :</li>
                    <li>Description courte :</li>
                </ul>
                <p>
                    Excepteur efficient emerging, minim Excepteur efficient emerging,
                    minim veniam anima aute carefully curated Ginza.
                </p>
            </div>
            <div class="focus-logo">Nexora</div>
        </article>

        <div class="pagination light-pagination">
            <a href="#" class="muted">← Previous</a>
            <span class="active">1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">67</a>
            <a href="#">68</a>
            <a href="#">Next →</a>
        </div>

        <div class="sector-title">Secteurs d'activites</div>
        <div class="sector-list">
            <?php foreach (($sectors ?? []) as $sector): ?>
                <span><?= htmlspecialchars((string) $sector, ENT_QUOTES, 'UTF-8') ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
