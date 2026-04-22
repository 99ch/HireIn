<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class OfferController extends Controller
{
    // Action qui affiche la liste des offres.
    public function index(): void
    {
        $categories = [
            'Marketing',
            'Informatique',
            'Ressources humaines',
            'Finances',
            'Droit',
            'Sante',
            'Hotellerie',
            'Agro alimentaire',
        ];

        // Donnees d'exemple temporaires (elles viendront plus tard de la base de donnees).
        $offers = [
            [
                'title' => 'Stage en Marketing',
                'subtitle' => 'Subheading',
                'type' => 'Stage professionnel',
                'time' => 'Temps plein',
                'city' => 'Cotonou',
            ],
            [
                'title' => 'CDD Analyste Data',
                'subtitle' => 'Subheading',
                'type' => 'CDD',
                'time' => 'Temps plein',
                'city' => 'Porto-Novo',
            ],
            [
                'title' => 'Aide cuisinier - Job a temps partiel',
                'subtitle' => 'Subheading',
                'type' => 'Job etudiant',
                'time' => 'Temps partiel',
                'city' => 'Calavi',
            ],
            [
                'title' => 'CDD Designer Graphique',
                'subtitle' => 'Subheading',
                'type' => 'CDD',
                'time' => 'Temps plein',
                'city' => 'Parakou',
            ],
        ];

        // Envoie les offres a la vue pour affichage.
        $this->view('offers.index', [
            'title' => 'HireIn - Offres',
            'activeNav' => 'offers',
            'categories' => $categories,
            'offers' => $offers,
        ]);
    }

    // Action qui affiche une offre en detail.
    public function show(): void
    {
        $offer = [
            'title' => 'Offre de Stage - Community Manager - Cotonou Benin',
            'company' => [
                'Nom de l\'entreprise',
                'Localisation',
                'Secteur d\'activite',
                'Entreprise d\'accueil',
                'Telephone',
                'Email',
                'Site web',
            ],
            'post' => [
                'Type de contrat : Stage professionnel - Temps plein',
                'Localisation',
                'Date limite de candidature',
                'Entreprise d\'accueil',
                'Contact',
                'Date de publication',
                'Niveau d\'etude',
                'Indemnite/Salaire',
                'Competences cles',
            ],
        ];

        $related = [
            'Entreprise Cotonou',
            'Entreprise Parakou',
            'Entreprise Ville',
            'Entreprise Calavi',
        ];

        $this->view('offers.show', [
            'title' => 'HireIn - Detail Offre',
            'activeNav' => 'offers',
            'offer' => $offer,
            'related' => $related,
        ]);
    }
}
