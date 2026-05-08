<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\AuthMiddleware;
use App\Core\Container;
use App\Core\Controller;
use App\Repositories\OfferRepository;
use App\Repositories\UserRepository;
use RuntimeException;

final class AuthController extends Controller
{
    // Page d'inscription etudiant.
    public function registerStudent(): void
    {
        $this->view('auth.register-student', [
            'title' => 'HireIn - Inscription Etudiant',
            'activeNav' => 'profiles',
            'flash' => $this->pullFlash(),
            'old' => $this->pullOld(),
        ]);
    }

    // Page d'inscription entreprise.
    public function registerCompany(): void
    {
        $this->view('auth.register-company', [
            'title' => 'HireIn - Inscription Entreprise',
            'activeNav' => 'profiles',
            'flash' => $this->pullFlash(),
            'old' => $this->pullOld(),
        ]);
    }

    // Page de connexion et espace entreprise.
    public function companySpace(): void
    {
        $authUser = $_SESSION['auth'] ?? null;
        $companyOffers = [];

        if (is_array($authUser) && ($authUser['role'] ?? '') === 'entreprise' && Container::has('db')) {
            $offerRepository = new OfferRepository(Container::get('db'));
            $companyOffers = $offerRepository->getByCompanyUserId((int) $authUser['id']);
        }

        $this->view('auth.company-space', [
            'title' => 'HireIn - Espace Entreprise',
            'activeNav' => 'offers',
            'flash' => $this->pullFlash(),
            'authUser' => $authUser,
            'companyOffers' => $companyOffers,
        ]);
    }

    public function registerStudentSubmit(): void
    {
        $fullname = trim((string) ($_POST['fullname'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $passwordConfirm = (string) ($_POST['password_confirm'] ?? '');

        $old = [
            'fullname' => $fullname,
            'city' => trim((string) ($_POST['city'] ?? '')),
            'level' => trim((string) ($_POST['level'] ?? '')),
            'search_sector' => trim((string) ($_POST['search_sector'] ?? '')),
            'university' => trim((string) ($_POST['university'] ?? '')),
            'phone' => trim((string) ($_POST['phone'] ?? '')),
            'skills' => trim((string) ($_POST['skills'] ?? '')),
            'email' => $email,
        ];

        if ($fullname === '' || $email === '' || $password === '') {
            $this->flashError('Veuillez remplir tous les champs obligatoires.');
            $this->storeOld($old);
            $this->redirect('/inscription');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->flashError('Email invalide.');
            $this->storeOld($old);
            $this->redirect('/inscription');
        }

        if ($password !== $passwordConfirm) {
            $this->flashError('Les mots de passe ne correspondent pas.');
            $this->storeOld($old);
            $this->redirect('/inscription');
        }

        try {
            $this->userRepository()->createStudent([
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'city' => $old['city'],
                'level' => $old['level'],
                'university' => $old['university'],
                'skills' => $old['skills'],
            ]);

            $this->flashSuccess('Compte etudiant cree avec succes. Connectez-vous.');
            $this->redirect('/espace-entreprise');
        } catch (RuntimeException $exception) {
            $this->flashError($exception->getMessage());
            $this->storeOld($old);
            $this->redirect('/inscription');
        }
    }

    public function registerCompanySubmit(): void
    {
        $companyName = trim((string) ($_POST['company_name'] ?? ''));
        $recruiterName = trim((string) ($_POST['recruiter_name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $passwordConfirm = (string) ($_POST['password_confirm'] ?? '');

        $old = [
            'company_name' => $companyName,
            'recruiter_name' => $recruiterName,
            'city' => trim((string) ($_POST['city'] ?? '')),
            'sector' => trim((string) ($_POST['sector'] ?? '')),
            'phone' => trim((string) ($_POST['phone'] ?? '')),
            'description' => trim((string) ($_POST['description'] ?? '')),
            'email' => $email,
        ];

        if ($companyName === '' || $recruiterName === '' || $email === '' || $password === '') {
            $this->flashError('Veuillez remplir tous les champs obligatoires.');
            $this->storeOld($old);
            $this->redirect('/inscription-entreprise');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->flashError('Email invalide.');
            $this->storeOld($old);
            $this->redirect('/inscription-entreprise');
        }

        if ($password !== $passwordConfirm) {
            $this->flashError('Les mots de passe ne correspondent pas.');
            $this->storeOld($old);
            $this->redirect('/inscription-entreprise');
        }

        try {
            $this->userRepository()->createCompany([
                'company_name' => $companyName,
                'recruiter_name' => $recruiterName,
                'email' => $email,
                'password' => $password,
                'city' => $old['city'],
                'sector' => $old['sector'],
                'description' => $old['description'],
            ]);

            $this->flashSuccess('Compte entreprise cree avec succes. Connectez-vous.');
            $this->redirect('/espace-entreprise');
        } catch (RuntimeException $exception) {
            $this->flashError($exception->getMessage());
            $this->storeOld($old);
            $this->redirect('/inscription-entreprise');
        }
    }

    public function loginSubmit(): void
    {
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $this->flashError('Veuillez renseigner email et mot de passe.');
            $this->redirect('/espace-entreprise');
        }

        $user = $this->userRepository()->findByEmail($email);
        if (!is_array($user) || !password_verify($password, (string) ($user['password_hash'] ?? ''))) {
            $this->flashError('Identifiants invalides.');
            $this->redirect('/espace-entreprise');
        }

        $_SESSION['auth'] = [
            'id' => (int) $user['id'],
            'role' => (string) $user['role'],
            'fullname' => (string) $user['fullname'],
            'email' => (string) $user['email'],
        ];

        $this->flashSuccess('Connexion reussie.');
        $this->redirect('/espace-entreprise');
    }

    public function logoutSubmit(): void
    {
        unset($_SESSION['auth']);
        $this->flashSuccess('Vous etes deconnecte.');
        $this->redirect('/espace-entreprise');
    }

    // Page du tableau de bord etudiant affichant les candidatures.
    public function studentApplications(): void
    {
        $authUser = AuthMiddleware::requireAuth(
            'etudiant',
            '/inscription',
            'Connexion etudiant requise.'
        );

        $applications = [];
        if (Container::has('db')) {
            $applicationRepository = new \App\Repositories\ApplicationRepository(Container::get('db'));
            $applications = $applicationRepository->getByStudent((int) $authUser['id'], 50, 0);
        }

        $this->view('profile.applications', [
            'title' => 'HireIn - Mes Candidatures',
            'activeNav' => 'profiles',
            'flash' => $this->pullFlash(),
            'applications' => $applications,
        ]);
    }

    private function userRepository(): UserRepository
    {
        if (!Container::has('db')) {
            throw new RuntimeException('Connexion base de donnees indisponible.');
        }

        return new UserRepository(Container::get('db'));
    }

    /**
     * @param array<string, string> $old
     */
    private function storeOld(array $old): void
    {
        $_SESSION['old'] = $old;
    }

    /**
     * @return array{type:string,message:string}|null
     */
    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        return is_array($flash) ? $flash : null;
    }

    /**
     * @return array<string, string>
     */
    private function pullOld(): array
    {
        $old = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);

        return is_array($old) ? $old : [];
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
