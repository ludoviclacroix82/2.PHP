<?php
require('./src/controllers/auth.php');
require('./src/helphers/function.php');

session_start();
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$action = isset($_SESSION['action']) ? $_SESSION['action'] : '';

$checkin =  authentication($userName, $password);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-challenge-auth</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <?php require('./src/views/menu.php'); ?>
  <main>
    <?php if (!empty($action)) :
      $alert = modaleAction($action)
    ?>
      <div class="alert">
        <h2><?= $alert ?></h2>
      </div>
    <?php
      unset($_SESSION['action']);
      endif;
    ?>
    <section>
      <?php require('./src/public/read.php'); ?>
    </section>
  </main>
  <?php require('./src/views/footer.php'); ?>    
</body>

</html>