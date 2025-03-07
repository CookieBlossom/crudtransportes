<?php
    class DB{
        private static $host = "localhost";
        private static $username = "root";
        private static $password = "Cookie.M004";
        private static $database = "transportes";
        private static $conn = null;
        public static function connect() {
            if (!isset(self::$conn)) {
                try {
                    self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$username, self::$password);
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Error en la conexión: " . $e->getMessage());
                }
            }
            return self::$conn;
        }
    }
?>