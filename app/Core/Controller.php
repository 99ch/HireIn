<?php

declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    // Methode utilitaire commune pour afficher une vue avec ses donnees.
    /** @param array<string, mixed> $data */
    protected function view(string $view, array $data = []): void
    {
        View::render($view, $data);
    }
}
