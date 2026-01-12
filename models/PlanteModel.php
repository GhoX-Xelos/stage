<?php
require_once __DIR__ . '/Database.php';

/**
 * Classe PlanteModel - Gestion des opérations sur les plantes
 */
class PlanteModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Récupère toutes les plantes
     * @return array
     */
    public function getAllPlantes() {
        try {
            $query = "SELECT * FROM plante ORDER BY nom ASC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des plantes : " . $e->getMessage());
            return [];
        }
    }

    /**
     * Récupère une plante par son ID
     * @param int $id
     * @return array|false
     */
    public function getPlanteById($id) {
        try {
            $query = "SELECT * FROM plante WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de la plante : " . $e->getMessage());
            return false;
        }
    }
}
?>
