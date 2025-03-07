<?php
    require_once 'src/controllers/routes.php';
    $route = isset($_GET['route']) ? $_GET['route'] : 'index';
    switch ($route) {
        case 'editTravel':
            require_once 'src/views/editTravel.php';
            break;

        case 'detailTravel':
            require_once 'src/views/detailTravel.php';
            break;
        case 'newTravel';
            require_once 'src/views/newTravel.php';
            break;
        default:
            require_once 'src/views/home.php';
            break;
    }
?>
