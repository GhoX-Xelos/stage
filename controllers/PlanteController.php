<?php
require_once __DIR__ . '/../models/PlanteModel.php';

$planteModel = new PlanteModel();

switch ($action) {
    case 'plantes':
        $plantes = $planteModel->getAllPlantes();
        
        // Récupérer toutes les espèces AVANT filtrage
        $toutesLesEspeces = array_unique(array_filter(array_map(function($p) { return $p['espece']; }, $plantes)));
        sort($toutesLesEspeces);
        
        // Si bouton réinitialiser cliqué, vider les filtres
        if (isset($_GET['reset'])) {
            // Afficher toutes les plantes
        } else {
            // Filtrer par recherche si nécessaire
            if (!empty($_GET['search'])) {
                $search = strtolower(trim($_GET['search']));
                $plantes = array_filter($plantes, function($plante) use ($search) {
                    return strpos(strtolower($plante['nom']), $search) !== false || 
                           strpos(strtolower($plante['espece']), $search) !== false;
                });
            }
            
            // Filtrer par espèce si nécessaire
            if (!empty($_GET['espece']) && !in_array('', $_GET['espece'])) {
                $especesSelectionnees = $_GET['espece'];
                $plantes = array_filter($plantes, function($plante) use ($especesSelectionnees) {
                    return in_array($plante['espece'], $especesSelectionnees);
                });
            }
        }
        
        include './views/plante/plantes.php';
        break;
    
    case 'description':
        if (isset($_GET['id'])) {
            $plante = $planteModel->getPlanteById($_GET['id']);
            if ($plante) {
                include './views/plante/description.php';
            } else {
                header('Location: index.php?controleur=plante&action=plantes');
                exit;
            }
        } else {
            header('Location: index.php?controleur=plante&action=plantes');
            exit;
        }
        break;
    
    default:
        $plantes = $planteModel->getAllPlantes();
        include './views/plante/plantes.php';
        break;
}


