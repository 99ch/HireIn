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

        $offers = [];

        if (Container::has('db')) {
            $offerRepository = new OfferRepository(Container::get('db'));
            $rows = $offerRepository->getAll(8, 0);

            foreach ($rows as $row) {
                $offers[] = [
                    'title' => (string) ($row['title'] ?? ''),
                    'subtitle' => trim((string) ($row['company_name'] ?? '') . ' - ' . (string) ($row['sector'] ?? '')),
                    'type' => $this->formatContractType((string) ($row['contract_type'] ?? '')),
                    'time' => $this->formatTimeLabel((string) ($row['deadline'] ?? '')),
                    'city' => (string) ($row['city'] ?? ''),
                ];
            }
        }

        if ($offers === []) {
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
        }

        // Envoie les offres a la vue pour affichage.
        $this->view('offers.index', [
            'title' => 'HireIn - Offres',
            'activeNav' => 'offers',
            'categories' => $categories,
            'offers' => $offers,
        ]);
    }

    public function store(): void
    {
        $auth = $_SESSION['auth'] ?? null;
        if (!is_array($auth) || ($auth['role'] ?? '') !== 'entreprise') {
            $this->flashError('Connexion entreprise requise pour publier une offre.');
            $this->redirect('/espace-entreprise');
        }

        $title = trim((string) ($_POST['title'] ?? ''));
        $city = trim((string) ($_POST['city'] ?? ''));
        $contractType = trim((string) ($_POST['contract_type'] ?? ''));
        $description = trim((string) ($_POST['description'] ?? ''));
        $deadline = trim((string) ($_POST['deadline'] ?? ''));

        if ($title === '' || $city === '' || $contractType === '' || $description === '') {
            $this->flashError('Veuillez remplir tous les champs obligatoires de l\'offre.');
            $this->redirect('/espace-entreprise');
        }

        if (!in_array($contractType, ['stage', 'cdd', 'job_etudiant'], true)) {
            $this->flashError('Type de contrat invalide.');
            $this->redirect('/espace-entreprise');
        }

        if (!Container::has('db')) {
            $this->flashError('Connexion base de donnees indisponible.');
            $this->redirect('/espace-entreprise');
        }

        $offerRepository = new OfferRepository(Container::get('db'));
        $offerRepository->create((int) $auth['id'], [
            'title' => $title,
            'city' => $city,
            'contract_type' => $contractType,
            'description' => $description,
            'deadline' => $deadline,
        ]);

        $this->flashSuccess('Offre publiee avec succes.');
        $this->redirect('/espace-entreprise');
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

        if (Container::has('db')) {
            $offerRepository = new OfferRepository(Container::get('db'));
            $offerId = (int) ($_GET['id'] ?? 0);
            $row = $offerId > 0 ? $offerRepository->getById($offerId) : null;

            if (is_array($row)) {
                $offer = [
                    'title' => (string) ($row['title'] ?? ''),
                    'company' => [
                        (string) ($row['company_name'] ?? ''),
                        (string) ($row['city'] ?? ''),
                        (string) ($row['sector'] ?? ''),
                        'Entreprise d\'accueil',
                        'Telephone',
                        'Email',
                        'Site web',
                    ],
                    'post' => [
                        'Type de contrat : ' . $this->formatContractType((string) ($row['contract_type'] ?? '')),
                        'Localisation : ' . (string) ($row['city'] ?? ''),
                        'Date limite de candidature : ' . (string) ($row['deadline'] ?? ''),
                        'Entreprise d\'accueil',
                        'Contact',
                        'Date de publication',
                        'Niveau d\'etude',
                        'Indemnite/Salaire',
                        'Competences cles',
                    ],
                ];
            }
        }

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

    private function formatContractType(string $contractType): string
    {
        return match ($contractType) {
            'stage' => 'Stage professionnel',
            'cdd' => 'CDD',
            'job_etudiant' => 'Job etudiant',
            default => ucfirst(str_replace('_', ' ', $contractType)),
        };
    }

    private function formatTimeLabel(string $deadline): string
    {
        return $deadline !== '' ? 'Date limite: ' . $deadline : 'Temps plein';
    }

    private function flashError(string $message): void
    {
        $_SESSION['flash'] = ['type' => 'error', 'message' => $message];
    }

    private function flashSuccess(string $message): void
    {
        $_SESSION['flash'] = ['type' => 'success', 'message' => $message];
    }

    private function redirect(string $path): never
    {
        header('Location: ' . $path);
        exit;
    }
}
