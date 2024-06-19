<?php
/**** Supprimer une randonnée ****/
  require('../controllers/auth.php');

  session_start();
  $userName = isset($_SESSION['username'])?$_SESSION['username']:'';
  $password = isset($_SESSION['password'])?$_SESSION['password']:'';

  $checkin =  authentication($userName,$password);

  if($checkin == 'true'){

    $idHikking = $_GET['id'];
    $data = [
      'id' =>  htmlspecialchars(trim($idHikking)),
    ];
    $queryDelete = "DELETE FROM `hiking` WHERE id = :id";
    $query= $bdd->prepare($queryDelete);
    $query->execute($data);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['action'] = 'delete';

    //close connexion
    $query = null;
    $bdd = null;
    exit(); 


  }else{
    header('Location: ../public/login.php');
    $_SESSION['action'] = 'error';
  }

?>