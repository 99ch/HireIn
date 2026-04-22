<section class="offer-layout">
    <aside class="offer-sidebar">
        <h2>Filtres</h2>

        <h3>Categories</h3>
        <ul>
            <?php foreach (($categories ?? []) as $category): ?>
                <li>
                    <span class="bullet"></span>
                    <?= htmlspecialchars((string) $category, ENT_QUOTES, 'UTF-8') ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="sidebar-bottom-links">
            <li><span class="bullet"></span> Parametre</li>
            <li><span class="bullet"></span> Deconnexion</li>
            <li><span class="bullet"></span> Dashboard</li>
        </ul>
    </aside>

    <div class="offer-content">
        <section class="offer-hero">
            <div class="search-wrap compact">
                <input type="text" placeholder="Rechercher un stage, CDD, etc.">
                <span class="search-icon">⌕</span>
            </div>

            <div class="tag-row">
                <span class="tag-pill">Stage academique</span>
                <span class="tag-pill">Stage pro</span>
                <span class="tag-pill is-muted">Job etudiant</span>
                <span class="tag-pill">CDD</span>
            </div>
        </section>

        <section class="offers-list-wrapper">
            <h1 class="section-title">Offres disponibles</h1>

            <?php foreach (($offers ?? []) as $offer): ?>
                <article class="offer-card-large">
                    <div>
                        <h2><?= htmlspecialchars((string) $offer['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="muted"><?= htmlspecialchars((string) $offer['subtitle'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="small-meta">
                            Type de contrat : <?= htmlspecialchars((string) $offer['type'], ENT_QUOTES, 'UTF-8') ?> -
                            <?= htmlspecialchars((string) $offer['time'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <p class="small-meta">Localisation : <?= htmlspecialchars((string) $offer['city'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="small-meta">Date limite de candidature :</p>
                        <p class="small-meta">Entreprise d'accueil :</p>
                        <p class="small-meta">Contact :</p>
                        <p class="small-meta">Date de publication :</p>
                        <p class="small-meta">Niveau d'etude :</p>
                        <p class="small-meta">Indemnite/Salaire :</p>
                        <p class="small-meta">Competences cles :</p>
                    </div>

                    <div class="offer-card-actions">
                        <div class="placeholder-thumb"></div>
                        <a class="btn-solid" href="#">Postuler</a>
                        <a class="text-link" href="/offres/detail">Plus d'info</a>
                    </div>
                </article>
            <?php endforeach; ?>

            <div class="pagination">
                <a href="#" class="muted">← Previous</a>
                <span class="active">1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <span>...</span>
                <a href="#">67</a>
                <a href="#">68</a>
                <a href="#">Next →</a>
            </div>
        </section>
    </div>
</section>
