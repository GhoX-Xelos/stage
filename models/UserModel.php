<?php
require_once __DIR__ . '/MySqlDb.php';

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = MySqlDb::getPdo();
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM utilisateur WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function createUser($email, $password, $nom = '', $prenom = '') {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateur (email, mdp, nom, prenom, role) VALUES (:email, :mdp, :nom, :prenom, :role)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'email' => $email,
            'mdp' => $hash,
            'nom' => $nom,
            'prenom' => $prenom,
            'role' => 'user'
        ]);
    }

    public function verifyPassword($password, $hash) {
        // Vérifie d'abord si c'est un hash valide
        if (password_verify($password, $hash)) {
            return true;
        }
        // Sinon, compare le mot de passe en plain text pour la compatibilité
        return $password === $hash;
    }
}
