<?php

switch ($action) {
    case 'envoyer':
        $message_envoi = null;
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nom = htmlspecialchars(isset($_POST['nom']) ? $_POST['nom'] : '');
                $prenom = htmlspecialchars(isset($_POST['prenom']) ? $_POST['prenom'] : '');
                $email = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '');
                $message = htmlspecialchars(isset($_POST['message']) ? $_POST['message'] : '');

                // Envoi de mail désactivé (PHPMailer supprimé)
                $message_envoi = "<p style='color:orange'>L'envoi de mail est désactivé.</p>";
        }
        include './views/contact/contact.php';
        break;
    case 'index':
    default:
        include './views/contact/contact.php';
        break;
}
