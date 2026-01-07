<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$controleur = isset($_GET['controleur']) ? $_GET['controleur'] : 'home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

$controleur = strtolower($controleur);
$action     = strtolower($action);

$controllerFile = './controllers/' . ucfirst($controleur) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
} else {
    echo "<h1>404 - Contrôleur introuvable</h1>";
}
