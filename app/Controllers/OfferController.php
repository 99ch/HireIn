<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class OfferController extends Controller
{
    public function index(): void
    {
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

        $this->view('offers.index', [
            'title' => 'HireIn - Offres',
            'offers' => $offers,
        ]);
    }
}
