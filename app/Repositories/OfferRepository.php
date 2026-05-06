<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

final class OfferRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Récupère toutes les offres disponibles avec pagination.
     *
     * @param int $limit Nombre d'offres par page
     * @param int $offset Décalage pour pagination
     * @return array Liste des offres
     */
    public function getAll(int $limit = 10, int $offset = 0): array
    {
        $sql = 'SELECT 
                    o.id,
                    o.title,
                    o.contract_type,
                    o.city,
                    o.description,
                    o.deadline,
                    o.status,
                    cp.company_name,
                    cp.sector
                FROM offers o
                JOIN company_profiles cp ON o.company_user_id = cp.user_id
                WHERE o.status = :status
                ORDER BY o.created_at DESC
                LIMIT :limit OFFSET :offset';

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'open', PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * Récupère une offre par ID.
     *
     * @param int $id ID de l'offre
     * @return array|null Offre trouvée ou null
     */
    public function getById(int $id): ?array
    {
        $sql = 'SELECT 
                    o.*,
                    cp.company_name,
                    cp.sector,
                    cp.description as company_description
                FROM offers o
                JOIN company_profiles cp ON o.company_user_id = cp.user_id
                WHERE o.id = :id AND o.status = :status';

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':status', 'open', PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Récupère les offres par catégorie/secteur.
     *
     * @param string $sector Secteur d'activité
     * @param int $limit Nombre d'offres
     * @return array Liste des offres
     */
    public function getBySector(string $sector, int $limit = 5): array
    {
        $sql = 'SELECT 
                    o.id,
                    o.title,
                    o.contract_type,
                    o.city,
                    cp.company_name
                FROM offers o
                JOIN company_profiles cp ON o.company_user_id = cp.user_id
                WHERE cp.sector LIKE :sector AND o.status = :status
                ORDER BY o.created_at DESC
                LIMIT :limit';

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':sector', '%' . $sector . '%', PDO::PARAM_STR);
        $stmt->bindValue(':status', 'open', PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * Compte le nombre total d'offres ouvertes.
     *
     * @return int Nombre d'offres
     */
    public function countOpen(): int
    {
        $sql = 'SELECT COUNT(*) as total FROM offers WHERE status = :status';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'open', PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($result['total'] ?? 0);
    }
}
