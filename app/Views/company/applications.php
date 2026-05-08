<div class="page-section">
    <div class="site-shell">
        <?php if (isset($flash) && is_array($flash)): ?>
            <div class="flash-message flash-<?php echo $flash['type'] === 'success' ? 'success' : 'error'; ?>" style="margin-bottom: 1.5rem;">
                <strong><?php echo $flash['type'] === 'success' ? 'Succes' : 'Erreur'; ?>:</strong>
                <?php echo htmlspecialchars($flash['message']); ?>
            </div>
        <?php endif; ?>

        <h1 style="font-size: 1.75rem; font-weight: 700; margin: 0 0 0.5rem 0;">
            Candidatures recues
        </h1>
        <p style="margin: 0 0 2rem 0; color: #666; font-size: 0.95rem;">
            Suivi des candidatures envoyees pour vos offres
        </p>

        <?php if (empty($applications)): ?>
            <div style="background: #f5f5f5; padding: 3rem 2rem; border-radius: var(--radius-lg); text-align: center;">
                <h2 style="margin: 0 0 0.5rem 0; font-size: 1.2rem; color: #666;">
                    Aucune candidature pour le moment
                </h2>
                <p style="margin: 0 0 1.5rem 0; color: #999;">
                    Publiez une offre pour commencer a recevoir des candidatures.
                </p>
                <a href="/espace-entreprise" class="btn-solid" style="display: inline-block; padding: 0.75rem 1.5rem; text-decoration: none; text-align: center;">
                    Publier une offre
                </a>
            </div>
        <?php else: ?>
            <div style="display: grid; gap: 1.5rem;">
                <?php foreach ($applications as $app): ?>
                    <div style="background: white; border: 1px solid #e0e0e0; border-radius: var(--radius-lg); padding: 1.5rem; display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                        <div>
                            <h3 style="margin: 0 0 0.5rem 0; font-size: 1.1rem; font-weight: 700; color: var(--text-main);">
                                <?php echo htmlspecialchars((string) ($app['title'] ?? '')); ?>
                            </h3>
                            <p style="margin: 0 0 1rem 0; color: #666; font-size: 0.95rem;">
                                <strong><?php echo htmlspecialchars((string) ($app['fullname'] ?? '')); ?></strong> •
                                <?php echo htmlspecialchars((string) ($app['city'] ?? '')); ?>
                            </p>

                            <div style="display: flex; gap: 1rem; flex-wrap: wrap; font-size: 0.85rem; margin-bottom: 1rem;">
                                <span style="background: #f0f0f0; padding: 0.35rem 0.75rem; border-radius: var(--radius);">
                                    <?php echo htmlspecialchars((string) ($app['university'] ?? 'Universite non precisee')); ?>
                                </span>
                                <span style="background: #f0f0f0; padding: 0.35rem 0.75rem; border-radius: var(--radius);">
                                    Competences: <?php echo htmlspecialchars((string) ($app['skills'] ?? 'Non specifiees')); ?>
                                </span>
                            </div>

                            <p style="margin: 0; color: #999; font-size: 0.9rem;">
                                Candidature envoyee le <?php
                                    $createdAt = (string) ($app['created_at'] ?? '');
                                    if ($createdAt !== '') {
                                        echo htmlspecialchars(date('d/m/Y a H:i', strtotime($createdAt)));
                                    } else {
                                        echo 'date inconnue';
                                    }
                                ?>
                            </p>
                        </div>

                        <div style="text-align: right;">
                            <?php
                                $statusLabels = [
                                    'sent' => 'Envoyee',
                                    'reviewed' => 'En examen',
                                    'accepted' => 'Acceptee',
                                    'rejected' => 'Refusee'
                                ];
                                $statusColors = [
                                    'sent' => '#5265d9',
                                    'reviewed' => '#ff7a00',
                                    'accepted' => '#4ca4d8',
                                    'rejected' => '#e74c3c'
                                ];
                                $status = (string) ($app['status'] ?? 'sent');
                                $label = $statusLabels[$status] ?? $status;
                                $color = $statusColors[$status] ?? '#999';
                            ?>
                            <span style="display: inline-block; background: <?php echo htmlspecialchars($color); ?>; color: white; padding: 0.5rem 1rem; border-radius: var(--radius); font-weight: 600; font-size: 0.9rem;">
                                <?php echo htmlspecialchars($label); ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e0e0e0;">
            <a href="/espace-entreprise" class="btn-outline" style="display: inline-block; padding: 0.75rem 1.5rem; text-decoration: none; text-align: center;">
                Retour a l'espace entreprise
            </a>
        </div>
    </div>
</div>
