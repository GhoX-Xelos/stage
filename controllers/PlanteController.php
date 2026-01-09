<?php

switch ($action) {
    case 'plantes':
        include './views/plante/plantes.php';
        break;
    
    case 'description':
        include './views/plante/description.php';
        break;
    
    default:
        include './views/plante/plantes.php';
        break;
}

