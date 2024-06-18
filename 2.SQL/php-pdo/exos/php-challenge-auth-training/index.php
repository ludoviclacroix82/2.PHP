<?php 
  require('./src/controllers/auth.php');

  session_start();
  $userName = isset($_SESSION['username'])?$_SESSION['username']:'';
  $password = isset($_SESSION['password'])?$_SESSION['password']:'';

  $checkin =  authentication($userName,$password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-challenge-auth</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php if($checkin == 'false') : ?>
    <a href="./src/public/login.php">Login</a> 
    <?php 
      else :
    ?>   
      <a href="./src/public/logout.php">Logout</a>
    <?php endif;?>
    | <a href="./src/public/create.php">Add</a>| 
</body>
</html>