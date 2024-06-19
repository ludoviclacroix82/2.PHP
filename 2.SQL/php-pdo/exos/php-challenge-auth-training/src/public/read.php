<?php
require_once('/var/www/dev/2.The-Hill/2.PHP/2.SQL/php-pdo/exos/php-challenge-auth-training/src/config/dbConfig.php');


$query = 'SELECT * FROM hiking WHERE 1';
$arrayHikking = $bdd->query($query);

?>
<div class="hikking">
  <div class="button">
    <a href="./src/public/create.php">
      <button type="submit" name="button">Add Hakking</button>
    </a>
  </div>

  <div class="header">
    <div class="row nameHikking">Nom de la randonnée</div>
    <div class="row difilculty">Difficulté</div>
    <div class="row distance">distance</div>
    <div class="row duree">Durée</div>
    <div class="row ">Dénivelé</div>
    <div class="row tools"></div>
  </div>
  <?php foreach ($arrayHikking as $hakking) : ?>
    <div class="list" id="<?php echo $hakking['id']; ?>">
      <div class="row nameHikking"><?php echo $hakking['name']; ?></div>
      <div class="row difilculty"><?php echo $hakking['difficulty']; ?></div>
      <div class="row distance"><?php echo $hakking['distance']; ?> km</div>
      <div class="row duree"><?php echo $hakking['duration']; ?></div>
      <div class="row height-difference"><?php echo $hakking['height_difference']; ?> m</div>
      <div class="row tools">
        <a href="./src/public/update.php?id=<?php echo $hakking['id']; ?>">
          <img src="././assets/images/icones/pencil-square.svg" title="Edit">
        </a>
        <a href="./src/controllers/delete.php?id=<?php echo $hakking['id']; ?>">
          <img src="././assets/images/icones/trash2.svg" title="Delete">
        </a>
      </div>
    </div>
  <?php endforeach; 
    $query = null;
    $bdd = null;
  ?>
</div>