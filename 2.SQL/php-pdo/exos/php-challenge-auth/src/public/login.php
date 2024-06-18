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
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/style.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
    <?php if($checkin == 'false') : ?>
    <form action="../controllers/check_login.php" method="post">
      <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username" require>
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password" require>
      </div>
      <div>
        <button type="submit" name="button">Se connecter</button>
      </div>
    </form> 
    <?php 
      else :
    ?>   
      Vous etes deja connecter
    <?php endif;?>
  </body>
</html>

