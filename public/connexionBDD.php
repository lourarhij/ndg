<?php
/**
 * @Route("Route", name="RouteName")
 */

session_start();

    function connectToDatabase() {
        include 'idConnexion.php';
        
        try {
            $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );
            $bdd = new PDO($dsn, $username, $password, $options);
            return $bdd;
        } catch(PDOException $e) {
            throw new Exception("Impossible de se connecter à la base : " . $e->getMessage());
        }

    }
?>