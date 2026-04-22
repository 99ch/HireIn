<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ProfileController extends Controller
{
    // Action qui affiche l'annuaire des profils etudiants.
    public function index(): void
    {
        $profiles = [
            [
                'name' => 'Laura Kadi',
                'job' => 'Graphisme',
                'skills' => 'Creation de visuel, Photoshop, Illustrator',
                'city' => 'Porto-Novo, Benin',
            ],
            [
                'name' => 'Kossi Adje',
                'job' => 'Marketing',
                'skills' => 'Campagnes digitales, Meta Ads, SEO',
                'city' => 'Cotonou, Benin',
            ],
            [
                'name' => 'Sonia Dossa',
                'job' => 'Developpeuse Web',
                'skills' => 'HTML, CSS, PHP, SQL',
                'city' => 'Abomey-Calavi, Benin',
            ],
            [
                'name' => 'Lina Agbo',
                'job' => 'Assistante RH',
                'skills' => 'Recrutement, Excel, administration',
                'city' => 'Parakou, Benin',
            ],
            [
                'name' => 'Marc Tevoedjre',
                'job' => 'Designer UI',
                'skills' => 'Figma, design system, prototypage',
                'city' => 'Porto-Novo, Benin',
            ],
            [
                'name' => 'Aicha Salif',
                'job' => 'Support Client',
                'skills' => 'Communication, CRM, suivi client',
                'city' => 'Cotonou, Benin',
            ],
        ];

        $this->view('profiles.index', [
            'title' => 'HireIn - Profils Etudiants',
            'activeNav' => 'profiles',
            'profiles' => $profiles,
        ]);
    }
}
