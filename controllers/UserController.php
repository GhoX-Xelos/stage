<?php
require_once './models/UserModel.php';

switch (strtolower($action)) {

    case 'login':
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $mdp   = isset($_POST['mdp']) ? $_POST['mdp'] : '';

            $userModel = new UserModel();
            $user = $userModel->findByEmail($email);

            if ($user) {
                // Connexion
                if ($userModel->verifyPassword($mdp, $user['mdp'])) {
                    $_SESSION['email'] = $user['email'];
                    header('Location: index.php');
                    exit;
                } else {
                    $message = "Mot de passe incorrect.";
                }
            } else {
                $message = "Cet email n'existe pas. Veuillez créer un compte.";
            }
        }

        include './views/user/login.php';
        break;

    case 'register':
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $mdp   = isset($_POST['mdp']) ? $_POST['mdp'] : '';
            $confirm_mdp = isset($_POST['confirm_mdp']) ? $_POST['confirm_mdp'] : '';
            $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
            $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
            $tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';

            // Validation des champs
            if (empty($email) || empty($mdp) || empty($confirm_mdp) || empty($nom) || empty($prenom) || empty($tel)) {
                $message = "Tous les champs sont obligatoires.";
            } elseif ($mdp !== $confirm_mdp) {
                $message = "Les mots de passe ne correspondent pas.";
            } else {
                $userModel = new UserModel();
                $user = $userModel->findByEmail($email);

                if ($user) {
                    $message = "Cet email est déjà utilisé.";
                } else {
                    $userModel->createUser($email, $mdp, $nom, $prenom, $tel);
                    $_SESSION['email'] = $email;
                    header('Location: index.php');
                    exit;
                }
            }
        }

        include './views/user/register.php';
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit;
}
