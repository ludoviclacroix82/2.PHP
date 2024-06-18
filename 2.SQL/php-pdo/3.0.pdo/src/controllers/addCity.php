<?php

require('../config/dbConfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $city = isset($_POST['city']) ? htmlspecialchars(trim($_POST['city'])) : '';
        $minTemp = isset($_POST['min']) ? htmlspecialchars(trim($_POST['min'])) : '';
        $maxTemp = isset($_POST['max']) ? htmlspecialchars(trim($_POST['max'])) : '';

        if (!empty($city) && is_numeric($minTemp) && is_numeric($maxTemp)) {
            try {
                // Connexion à MySQL
                $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $data = [
                    'ville' => $city,
                    'haut' => $maxTemp,
                    'bas' => $minTemp,
                ];

                $insertQuery = "INSERT INTO Meteo (ville, haut, bas) VALUES (:ville, :haut, :bas)";
                $query = $bdd->prepare($insertQuery);
                $query->execute($data);

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                
                //close connexion
                $query = null;
                $bdd = null;
                exit();
            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        } else {
            echo 'Les champs ville, minTemp et maxTemp doivent être correctement remplis.';
        }
    }
}
