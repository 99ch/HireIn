<section class="profiles-hero">
    <div class="site-shell">
        <h1 class="section-title center light">Profils etudiants</h1>
        <p class="section-subtitle center light">Decouvrez des profils talentueux</p>

        <div class="search-wrap profile-search">
            <input type="text" placeholder="Search">
            <span class="search-icon">⌕</span>
        </div>

        <p class="recruiter-note">Vous etes recruteur ? Creez un compte pour acceder au CV et contactez les etudiants !</p>
    </div>
</section>

<section class="site-shell page-section">
    <div class="profile-grid">
        <?php foreach (($profiles ?? []) as $profile): ?>
            <article class="profile-card">
                <div class="profile-header">
                    <div class="avatar-placeholder"></div>
                    <div>
                        <h2><?= htmlspecialchars((string) $profile['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="muted uppercase"><?= htmlspecialchars((string) $profile['job'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div>
                        <p class="small-title">Competences:</p>
                        <p class="muted"><?= htmlspecialchars((string) $profile['skills'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="muted city"><?= htmlspecialchars((string) $profile['city'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>

                <p class="small-meta">Email : yourmail@gmail.com</p>
                <p class="small-meta">Universite GAZA Formation</p>

                <h3>Info</h3>
                <p>
                    Excepteur efficient emerging, minim veniam anima aute carefully curated
                    Ginza, Excepteur efficient emerging, minim veniam anima aute carefully
                    curated Ginza.
                </p>

                <div class="profile-footer">
                    <a href="#" class="text-link accent">Voir le CV</a>
                    <span class="stars">☆☆☆☆☆</span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

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
