<?php
function route($url) {
    switch ($url) {
        case '/editTravel':
            require_once 'src/controllers/TravelController.php';
            $controller = new TravelController();
            $controller->editTravel();
            break;
        case '/detailTravel':
            require_once 'src/controllers/TravelController.php';
            $controller = new TravelController();
            $controller->detailTravel();
            break;
    }
}
?>
