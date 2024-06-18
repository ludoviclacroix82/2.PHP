<?php

require ('../config/dbConfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Initialisation du tableau $cityDelete
   $cityDelete  = isset($_POST['deleteCity']) ? $_POST['deleteCity'] : '';

   if (!empty($cityDelete) ) {
    
        try {

            global $cityDelete;
            // Connexion à MySQL
            $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($cityDelete as  $city) {
                $data = [
                    'ville' =>  htmlspecialchars(trim($city)),
                ];
                $queryDelete = "DELETE FROM Meteo WHERE ville = :ville";
                $query= $bdd->prepare($queryDelete);
                $query->execute($data);
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);

            //close connexion
            $query = null;
            $bdd = null;
            exit(); 

        } catch (PDOException $e) {
            // En cas d'erreur PDO, afficher l'erreur
            die('Erreur : ' . $e->getMessage());
        }
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(); 
    }
}
?>
