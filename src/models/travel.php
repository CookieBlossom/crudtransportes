<?php
    require_once 'db.php';
    class Travel {private $db; private $id; private $origin; private $destination;
        public function __construct() {
            $this->db = db::connect();
        }
        public function getAll() {
            try{
                $sql = 'SELECT * FROM viajes';
                $query = $this->db->prepare($sql);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }  catch(PDOException $e){
                return false;
            }
        }
        public function getById($id) {
            try{
                $sql = 'SELECT * FROM viajes WHERE id = :id';
                $query = $this->db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
                return $query->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return false;
            }
        }
        public function getByOrigin($origin) {
            try {  
                $sql = 'SELECT * FROM viajes WHERE origen = :origin';
                $query = $this->db->prepare($sql);
                $query->bindParam(':origin', $origin);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }
        public function getByDestination($destination) {
            try {
                $sql = 'SELECT * FROM viajes WHERE destino = :destination';
                $query = $this->db->prepare($sql);
                $query->bindParam(':destination', $destination);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }
        public function createTravel($origin_address, $origin_commune, $origin_contact, $destination_address, $destination_commune, $destination_contact, $date, $executive_user, $requester_user, $value) {
            try {
                $sql = "INSERT INTO viajes (origen_direccion, origen_comuna, origen_contacto, destino_direccion, destino_comuna, destino_contacto, fecha_viaje, usuario_ejecutivo, usuario_solicitante, valor) 
                        VALUES (:origin_address, :origin_commune, :origin_contact, :destination_address, :destination_commune, :destination_contact, :travel_date, :executive_user, :requester_user, :travel_value)";
                $query = $this->db->prepare($sql);
                $query->bindParam(':origin_address', $origin_address);
                $query->bindParam(':origin_commune', $origin_commune);
                $query->bindParam(':origin_contact', $origin_contact);
                $query->bindParam(':destination_address', $destination_address);
                $query->bindParam(':destination_commune', $destination_commune);
                $query->bindParam(':destination_contact', $destination_contact);
                $query->bindParam(':travel_date', $date);
                $query->bindParam(':executive_user', $executive_user);
                $query->bindParam(':requester_user', $requester_user);
                $query->bindParam(':travel_value', $value);
                return $query->execute();
            } catch (PDOException $e) {
                return false;
            }
        }
        public function updateTravel($origin_address, $origin_commune, $origin_contact, $destination_address, $destination_commune, $destination_contact, $date, $executive_user, $requester_user, $value, $id) {
            try {
                $sql = 'UPDATE viajes 
                        SET origen_direccion = :origin_address, origen_comuna = :origin_commune, origen_contacto = :origin_contact, 
                            destino_direccion = :destination_address, destino_comuna = :destination_commune, destino_contacto = :destination_contact, 
                            fecha_viaje = :travel_date, usuario_ejecutivo = :executive_user, usuario_solicitante = :requester_user, valor = :travel_value
                        WHERE id = :id';
                $query = $this->db->prepare($sql);
                $query->bindParam(':origin_address', $origin_address);
                $query->bindParam(':origin_commune', $origin_commune);
                $query->bindParam(':origin_contact', $origin_contact);
                $query->bindParam(':destination_address', $destination_address);
                $query->bindParam(':destination_commune', $destination_commune);
                $query->bindParam(':destination_contact', $destination_contact);
                $query->bindParam(':travel_date', $date);
                $query->bindParam(':executive_user', $executive_user);
                $query->bindParam(':requester_user', $requester_user);
                $query->bindParam(':travel_value', $value);
                $query->bindParam(':id', $id);
                return $query->execute();
            } catch (PDOException $e) {
                return false;
            }
        }
        public function deleteTravel($id) {
            try{
                $sql = 'DELETE FROM viajes WHERE id = :id';
                $query = $this->db->prepare($sql);
                $query->bindParam(':id', $id);
                return $query->execute();
            } catch (PDOException $e) {
                return false;
            }
        }
    }  
?>