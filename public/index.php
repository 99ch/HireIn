<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\CompanyController;
use App\Controllers\HomeController;
use App\Controllers\OfferController;
use App\Controllers\ProfileController;
use App\Core\Router;

// Permet au serveur PHP integre de servir directement les fichiers statiques.
if (PHP_SAPI === 'cli-server') {
    $requestedPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $staticFile = __DIR__ . '/' . ltrim((string) $requestedPath, '/');

    if (is_file($staticFile)) {
        return false;
    }
}

// Autoload minimal: charge automatiquement les classes du namespace App\.
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    // Convertit App\Core\Router en chemin de fichier app/Core/Router.php.
    $relativeClass = substr($class, strlen($prefix));
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

// Declaration des routes GET de l'application.
$router = new Router();
$router->get('/', [HomeController::class, 'index']);
$router->get('/a-propos', [HomeController::class, 'about']);
$router->get('/offres', [OfferController::class, 'index']);
$router->get('/offres/detail', [OfferController::class, 'show']);
$router->get('/profils', [ProfileController::class, 'index']);
$router->get('/entreprises', [CompanyController::class, 'index']);
$router->get('/inscription', [AuthController::class, 'registerStudent']);
$router->get('/inscription-entreprise', [AuthController::class, 'registerCompany']);
$router->get('/espace-entreprise', [AuthController::class, 'companySpace']);

// Recupere la requete HTTP courante puis la confie au routeur.
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$router->dispatch($method, is_string($path) ? $path : '/');
