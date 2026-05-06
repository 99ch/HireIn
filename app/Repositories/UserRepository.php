<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;
use PDOException;
use RuntimeException;

final class UserRepository
{
    public function __construct(private PDO $db)
    {
    }

    /**
     * @param array<string, string> $data
     */
    public function createStudent(array $data): int
    {
        $this->db->beginTransaction();

        try {
            $userId = $this->createUser(
                role: 'etudiant',
                fullname: $data['fullname'],
                email: $data['email'],
                password: $data['password']
            );

            $stmt = $this->db->prepare(
                'INSERT INTO student_profiles (user_id, university, level, skills, city)
                 VALUES (:user_id, :university, :level, :skills, :city)'
            );

            $stmt->execute([
                ':user_id' => $userId,
                ':university' => $data['university'] !== '' ? $data['university'] : null,
                ':level' => $data['level'] !== '' ? $data['level'] : null,
                ':skills' => $data['skills'] !== '' ? $data['skills'] : null,
                ':city' => $data['city'] !== '' ? $data['city'] : null,
            ]);

            $this->db->commit();

            return $userId;
        } catch (PDOException $exception) {
            $this->db->rollBack();
            throw $this->mapDatabaseException($exception);
        }
    }

    /**
     * @param array<string, string> $data
     */
    public function createCompany(array $data): int
    {
        $this->db->beginTransaction();

        try {
            $userId = $this->createUser(
                role: 'entreprise',
                fullname: $data['recruiter_name'],
                email: $data['email'],
                password: $data['password']
            );

            $stmt = $this->db->prepare(
                'INSERT INTO company_profiles (user_id, company_name, sector, city, description)
                 VALUES (:user_id, :company_name, :sector, :city, :description)'
            );

            $stmt->execute([
                ':user_id' => $userId,
                ':company_name' => $data['company_name'],
                ':sector' => $data['sector'] !== '' ? $data['sector'] : null,
                ':city' => $data['city'] !== '' ? $data['city'] : null,
                ':description' => $data['description'] !== '' ? $data['description'] : null,
            ]);

            $this->db->commit();

            return $userId;
        } catch (PDOException $exception) {
            $this->db->rollBack();
            throw $this->mapDatabaseException($exception);
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT id, role, fullname, email, password_hash FROM users WHERE email = :email LIMIT 1'
        );

        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    private function createUser(string $role, string $fullname, string $email, string $password): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (role, fullname, email, password_hash)
             VALUES (:role, :fullname, :email, :password_hash)'
        );

        $stmt->execute([
            ':role' => $role,
            ':fullname' => $fullname,
            ':email' => $email,
            ':password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return (int) $this->db->lastInsertId();
    }

    private function mapDatabaseException(PDOException $exception): RuntimeException
    {
        $message = $exception->getMessage();
        if (str_contains($message, 'Duplicate entry') && str_contains($message, 'email')) {
            return new RuntimeException('Cet email existe deja.');
        }

        return new RuntimeException('Operation base de donnees impossible.');
    }
}
