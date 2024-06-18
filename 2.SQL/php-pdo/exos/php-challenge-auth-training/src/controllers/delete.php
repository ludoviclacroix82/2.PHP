<?php
/**** Supprimer une randonnée ****/
  require('../controllers/auth.php');

  session_start();
  $userName = isset($_SESSION['username'])?$_SESSION['username']:'';
  $password = isset($_SESSION['password'])?$_SESSION['password']:'';

  $checkin =  authentication($userName,$password);

  if($checkin == 'true'){

  }else{
    header('Location: ../public/login.php');
  }

?>