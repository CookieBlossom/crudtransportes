<?php
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/travel.php';

class TravelController {
    public function editTravel() {
        require_once 'src/views/editTravel.php';
    }
    public function detailTravel() {
        require_once 'src/views/detailTravel.php';
    }
    public function createTravel() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Método no permitido"]);
            exit;
        }
        $travelModel = new Travel();
        $requiredFields = ['travel_date', 'origin_address', 'origin_commune', 'origin_contact','destination_address', 'destination_commune', 'destination_contact','executive_user', 'requester_user', 'travel_value'];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                echo json_encode(["status" => "error", "message" => "Faltan datos: " . $field]);
                exit;
            }
        }
        $date = $_POST['travel_date'];
        $origin_address = $_POST['origin_address'];
        $origin_commune = $_POST['origin_commune'];
        $origin_contact = $_POST['origin_contact'];
        $destination_address = $_POST['destination_address'];
        $destination_commune = $_POST['destination_commune'];
        $destination_contact = $_POST['destination_contact'];
        $executive_user = $_POST['executive_user'];
        $requester_user = $_POST['requester_user'];
        $value = $_POST['travel_value'];
        $result = $travelModel->createTravel($origin_address, $origin_commune, $origin_contact,$destination_address, $destination_commune, $destination_contact,$date, $executive_user, $requester_user, $value);
        if ($result) {
            echo json_encode(["status" => "success", "message" => "Viaje creado con éxito"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al guardar en la base de datos"]);
        }
    }
}
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'createTravel') {
        $controller = new TravelController();
        $controller->createTravel();
    }
?>
