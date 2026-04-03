<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'HireIn', ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #1f2937; }
        header { background: #0f766e; color: #fff; padding: 14px 20px; }
        nav a { color: #fff; margin-right: 16px; text-decoration: none; font-weight: bold; }
        main { max-width: 980px; margin: 20px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 10px; padding: 14px; margin-bottom: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06); }
        .meta { color: #4b5563; font-size: 14px; }
        footer { text-align: center; padding: 24px; color: #6b7280; }
    </style>
</head>
<body>
<!-- Entete global avec navigation principale. -->
<header>
    <nav>
        <a href="/">Accueil</a>
        <a href="/offres">Offres</a>
    </nav>
</header>
<main>
    <!-- Ici, on injecte le contenu de la vue courante. -->
    <?= $content ?>
</main>
<footer>
    HireIn - Prototype soutenance
</footer>
</body>
</html>
