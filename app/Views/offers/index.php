<section class="card">
    <h1>Offres disponibles</h1>
    <p class="meta">Exemples d'offres pour le demarrage du projet.</p>
</section>

<?php foreach (($offers ?? []) as $offer): ?>
    <article class="card">
        <h2><?= htmlspecialchars((string) $offer['title'], ENT_QUOTES, 'UTF-8') ?></h2>
        <p class="meta">
            <?= htmlspecialchars((string) $offer['company'], ENT_QUOTES, 'UTF-8') ?>
            - <?= htmlspecialchars((string) $offer['city'], ENT_QUOTES, 'UTF-8') ?>
            - <?= htmlspecialchars((string) $offer['type'], ENT_QUOTES, 'UTF-8') ?>
        </p>
    </article>
<?php endforeach; ?>
