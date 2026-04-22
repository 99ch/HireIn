<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class AuthController extends Controller
{
    // Page d'inscription etudiant.
    public function registerStudent(): void
    {
        $this->view('auth.register-student', [
            'title' => 'HireIn - Inscription Etudiant',
            'activeNav' => 'profiles',
        ]);
    }

    // Page d'inscription entreprise.
    public function registerCompany(): void
    {
        $this->view('auth.register-company', [
            'title' => 'HireIn - Inscription Entreprise',
            'activeNav' => 'profiles',
        ]);
    }

    // Page de connexion et espace entreprise.
    public function companySpace(): void
    {
        $this->view('auth.company-space', [
            'title' => 'HireIn - Espace Entreprise',
            'activeNav' => 'offers',
        ]);
    }
}
