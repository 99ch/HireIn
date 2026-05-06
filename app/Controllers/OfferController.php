<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

use App\Core\Container;
use App\Repositories\OfferRepository;
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


        // Recupere les offres depuis le repository (base de donnees).
        $db = Container::get('db');
        $offerRepository = new OfferRepository($db);
        $offers = $offerRepository->getAll(limit: 20, offset: 0);
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
