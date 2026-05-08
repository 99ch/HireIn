<section class="offer-detail-top">
    <div class="site-shell">
        <div class="detail-toolbar">
            <div class="chair"></div>
            <div class="toolbar-main">
                <div class="tag-row">
                    <span class="tag-pill">Stage academique</span>
                    <span class="tag-pill">Stage pro</span>
                    <span class="tag-pill is-muted">Job etudiant</span>
                    <span class="tag-pill">CDD</span>
                </div>
                <div class="search-wrap compact">
                    <input type="text" placeholder="Rechercher un stage, CDD, etc.">
                    <span class="search-icon">⌕</span>
                </div>
            </div>
        </div>

        <h1 class="section-title center"><?= htmlspecialchars((string) ($offer['title'] ?? ''), ENT_QUOTES, 'UTF-8') ?></h1>

        <div class="detail-summary-grid">
            <article class="detail-box">
                <h2>Information sur l'entreprise</h2>
                <ul>
                    <?php foreach (($offer['company'] ?? []) as $line): ?>
                        <li><?= htmlspecialchars((string) $line, ENT_QUOTES, 'UTF-8') ?> :</li>
                    <?php endforeach; ?>
                </ul>
                <p>
                    Excepteur efficient emerging, minim veniam anima aute carefully curated
                    Ginza.
                </p>
            </article>

            <article class="detail-box">
                <h2>Resume du poste</h2>
                <ul>
                    <?php foreach (($offer['post'] ?? []) as $line): ?>
                        <li><?= htmlspecialchars((string) $line, ENT_QUOTES, 'UTF-8') ?> :</li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="site-shell page-section">
    <article class="simple-card">
        <h2 class="card-title">Profil recherche</h2>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
    </article>

    <article class="simple-card">
        <h2 class="card-title">Details du poste</h2>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>
        <p>
            Body text for your whole article or post. We'll put in some lorem ipsum to
            show how a filled-out page might look.
        </p>

        <div class="detail-actions">
            <a href="/offres/candidater?id=<?php echo isset($offer) && is_array($offer) && isset($_GET['id']) ? (int) $_GET['id'] : ''; ?>" class="btn-solid" style="display: inline-block; padding: 0.75rem 1.5rem; text-decoration: none; text-align: center;">
                Postuler à cette offre
            </a>
        </div>
    </article>

    <h2 class="section-title">Autres offres</h2>
    <div class="related-grid">
        <?php foreach (($related ?? []) as $item): ?>
            <article class="related-card">
                <div class="related-thumb"></div>
                <h3><?= htmlspecialchars((string) $item, ENT_QUOTES, 'UTF-8') ?></h3>
                <p>Body text.</p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
