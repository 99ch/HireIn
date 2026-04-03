<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class HomeController extends Controller
{
    // Action de la page d'accueil.
    public function index(): void
    {
        // Envoie le titre a la vue home.
        $this->view('home', [
            'title' => 'HireIn - Accueil',
        ]);
    }
}
