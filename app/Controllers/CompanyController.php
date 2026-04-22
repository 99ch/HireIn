<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class CompanyController extends Controller
{
    // Action qui affiche l'annuaire des entreprises.
    public function index(): void
    {
        $companies = [
            'Nexora Talents',
            'Lead Heritage',
            'Brave Studio',
            'Progress Afrik',
            'Kouche Limited',
            'Benin Corp',
            'GD & Associes',
            'Oak Vision',
            'Saer Group',
            'Egnon Consulting',
            'Vision Plus',
            'Talents Hub',
        ];

        $sectors = [
            'Banque finance',
            'Laboratoire et biotechnologie',
            'Sante',
            'Tourisme et restauration',
            'Agroalimentaire',
            'Technologie de l\'information',
            'Ressources humaines',
            'Industrie',
            'Comptabilite et audit',
            'Droits',
            'Conseil et management',
            'Construction',
        ];

        $this->view('companies.index', [
            'title' => 'HireIn - Annuaire Entreprises',
            'activeNav' => 'profiles',
            'companies' => $companies,
            'sectors' => $sectors,
        ]);
    }
}
