<?php

/**** Supprimer une randonnée ****/
require('../controllers/auth.php');

session_start();
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

$checkin =  authentication($userName, $password);

if ($checkin == 'true') {

  var_dump($_POST);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $difficulty = isset($_POST['difficulty']) ? trim($_POST['difficulty']) : '';
    $distance = isset($_POST['distance']) ? trim($_POST['distance']) : '';
    $duration = isset($_POST['duration']) ? trim($_POST['duration']) : '';
    $heightDifference = isset($_POST['height_difference']) ? trim($_POST['height_difference']) : '';

    if (!empty($name) && !empty($difficulty) && !empty($distance) && !empty($duration) && !empty($heightDifference)) {

      try {

        $data = [
          'name' => $name,
          'difficulty' => $difficulty,
          'distance' => $distance,
          'duration' => $duration,
          'height_difference' => intval($heightDifference),
          'id'=> intval($id),
        ];

        $updateQuery = "UPDATE hiking 
        SET name = :name, 
            difficulty = :difficulty, 
            distance = :distance, 
            duration = :duration, 
            height_difference = :height_difference 
        WHERE id = :id";


        $query = $bdd->prepare($updateQuery);
        $query->execute($data);
        
        header('Location: ../../index.php');
        $_SESSION['action'] = 'update';

        //close connexion
        $query = null;
        $bdd = null;
        exit();

      } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur de connexion : " . $e->getMessage();
      }
    } else {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      $_SESSION['action'] = 'error';
    }
  }
} else {
  header('Location: ../public/login.php');
  $_SESSION['action'] = 'error';
}
