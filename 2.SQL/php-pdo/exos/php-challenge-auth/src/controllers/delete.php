<?php 
  require('../controllers/auth.php');

  session_start();
  $userName = isset($_SESSION['username'])?$_SESSION['username']:'';
  $password = isset($_SESSION['password'])?$_SESSION['password']:'';

  $checkin =  authentication($userName,$password);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete</title>
    <link rel="stylesheet" href="../../assets/css/style.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
    <?php if($checkin == 'true') : ?>
    <?php 
      else :
    ?>   
    <?php 
    header('Location: ../public/login.php');
    endif; ?>
  </body>
</html>

