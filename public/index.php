<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\OfferController;
use App\Core\Router;

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

$router = new Router();
$router->get('/', [HomeController::class, 'index']);
$router->get('/offres', [OfferController::class, 'index']);

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$router->dispatch($method, is_string($path) ? $path : '/');
