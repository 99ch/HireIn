<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class OfferController extends Controller
{
    // Action qui affiche la liste des offres.
    public function index(): void
    {
        // Donnees d'exemple temporaires (elles viendront plus tard de la base de donnees).
        $offers = [
            [
                'title' => 'Stage Developpement Web',
                'company' => 'BeninTech',
                'city' => 'Cotonou',
                'type' => 'Stage',
            ],
            [
                'title' => 'Assistant Marketing Digital',
                'company' => 'NovaCom',
                'city' => 'Porto-Novo',
                'type' => 'CDD',
            ],
            [
                'title' => 'Support Client Weekend',
                'company' => 'SmartService',
                'city' => 'Parakou',
                'type' => 'Job etudiant',
            ],
        ];

        // Envoie les offres a la vue pour affichage.
        $this->view('offers.index', [
            'title' => 'HireIn - Offres',
            'offers' => $offers,
        ]);
    }
}
