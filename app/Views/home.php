<section class="home-top">
    <div class="site-shell home-intro">
        <h1 class="home-logo">HireIn</h1>
        <p class="muted">lorem imsom lorem imsom</p>

        <div class="chip-row">
            <?php foreach (($heroTags ?? []) as $tag): ?>
                <span class="chip"><?= htmlspecialchars((string) $tag, ENT_QUOTES, 'UTF-8') ?></span>
            <?php endforeach; ?>
        </div>

        <div class="search-wrap">
            <input type="text" placeholder="Rechercher un stage, CDD, etc.">
            <span class="search-icon">⌕</span>
        </div>

        <div class="hero-photo"></div>

        <h2 class="section-title center">Trouvez vos futurs talents parmi les meilleurs etudiants</h2>
    </div>
</section>

<section class="network-bg">
    <div class="site-shell">
        <div class="talent-grid">
            <?php foreach (($talents ?? []) as $talent): ?>
                <article class="talent-card tone-<?= htmlspecialchars((string) $talent['tone'], ENT_QUOTES, 'UTF-8') ?>">
                    <p class="stars"><?= str_repeat('★', (int) $talent['stars']) ?><?= str_repeat('☆', max(0, 5 - (int) $talent['stars'])) ?></p>
                    <h3><?= htmlspecialchars((string) $talent['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars((string) $talent['role'], ENT_QUOTES, 'UTF-8') ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="site-shell stacked-section">
    <h2 class="section-title">Contrat a duree determine (CDD)</h2>
    <p class="section-subtitle">Des offres pensees pour accelerer vos recrutements avec un format clair et direct.</p>
    <div class="slider-row">
        <button class="arrow" type="button">‹</button>
        <div class="poster-grid poster-grid-3">
            <article class="poster-card tall"></article>
            <article class="poster-card tall is-main"></article>
            <article class="poster-card tall"></article>
        </div>
        <button class="arrow" type="button">›</button>
    </div>
</section>

<section class="site-shell stacked-section">
    <h2 class="section-title">Stages professionnels et academiques</h2>
    <p class="section-subtitle">Decouvrez des profils qualifies et des postes adaptes aux jeunes talents.</p>
    <div class="highlight-strip">
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
    </div>
</section>

<section class="site-shell stacked-section">
    <div class="split-headline">
        <div>
            <h2 class="section-title">Jobs a temps partiel pour etudiant(e)s</h2>
            <p class="section-subtitle left">Une section dediee aux jobs flexibles pour etudiants et jeunes diplomes.</p>
        </div>
        <div class="thumb-stack">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="highlight-strip wide">
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
        <article class="mini-offer"></article>
    </div>
</section>

<section class="site-shell stacked-section recruiters-section">
    <h2 class="section-title center">Entreprises qui recrutent</h2>

    <div class="slider-row">
        <button class="arrow" type="button">‹</button>
        <div class="recruiter-grid">
            <article></article>
            <article></article>
            <article></article>
        </div>
        <button class="arrow" type="button">›</button>
    </div>

    <div class="city-grid">
        <?php foreach (($cities ?? []) as $city): ?>
            <span><?= htmlspecialchars((string) $city, ENT_QUOTES, 'UTF-8') ?></span>
        <?php endforeach; ?>
    </div>

    <div class="benefit-grid">
        <article>
            <h3>Recherche ciblee</h3>
            <p>Utilisez nos filtres avances pour trouver rapidement les profils adaptes.</p>
        </article>
        <article>
            <h3>Gestion simplifiee</h3>
            <p>Interface simple et fluide pour publier et suivre les candidatures.</p>
        </article>
        <article>
            <h3>Gain de temps</h3>
            <p>Centralisez vos besoins et prenez de meilleures decisions recrutement.</p>
        </article>
    </div>
</section>
