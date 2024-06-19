<nav>
<?php if ($checkin == 'false') : ?>
    <a href="./src/public/login.php">Login</a>
  <?php
  else :
  ?>
    <a href="./src/controllers/logout.php">Logout</a>
  <?php endif; ?>
</nav>