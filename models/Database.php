<?php
/**
 * Classe Database - Gestion de la connexion à la base de données
 * Pattern Singleton pour assurer une seule instance de connexion
 */
class Database {
    private static $instance = null;
    private $pdo;

    // Configuration de la base de données
    const DB_HOST = 'localhost';
    const DB_NAME = 'niak';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_CHARSET = 'utf8mb4';

    /**
     * Constructeur privé pour empêcher l'instanciation directe
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;
            
            $this->pdo = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * Empêche le clonage de l'instance
     */
    private function __clone() {}

    /**
     * Empêche la désérialisation de l'instance
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }

    /**
     * Retourne l'instance unique de Database
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retourne l'objet PDO
     * @return PDO
     */
    public function getConnection() {
        return $this->pdo;
    }
}
?>
