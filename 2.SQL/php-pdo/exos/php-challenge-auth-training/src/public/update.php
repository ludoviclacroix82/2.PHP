<?php
require('../controllers/auth.php');
require('../helphers/function.php');

require_once('/var/www/dev/2.The-Hill/2.PHP/2.SQL/php-pdo/exos/php-challenge-auth-training/src/config/dbConfig.php');

session_start();
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$checkin =  authentication($userName, $password);

$idHikking = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';

$query = $bdd->prepare('SELECT * FROM hiking WHERE id = :idHikking');
$query->execute(['idHikking' => $idHikking]);
$hikking = $query->fetch(PDO::FETCH_ASSOC);
$count = $query->rowCount();

$selectDifficulty = selectDifficulty(); // function dans helphers/function.php

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
	<?php require('../views/menu.php'); ?>
	<main>
		<section>
			<?php if ($checkin == 'true') :
				if ($count > 0) :
			?>
					<form action="../controllers/updateHikking.php" method="post">
						<div class="tools">
							<h1>Update</h1>
							<a href="../../index.php">Liste des données</a>
						</div>
						<div class="control-form ">
							<input type="text" class='disabled' name="id" value="<?php echo $hikking['id']; ?>">
							<label for="name">Hikking</label>
							<input type="text" class="name-input" name="name" value="<?php echo $hikking['name']; ?>">
						</div>

						<div class="control-form">
							<label for="difficulty">Difficulté</label>
							<select name="difficulty">
								<?php foreach ($selectDifficulty as $difficulty) :
									$selected = ($difficulty === $hikking['difficulty']) ? 'selected' : '';
								?>
									<option value="<?= $difficulty; ?>" <?= $selected; ?>><?= $difficulty; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="control-form">
							<label for="distance">Distance</label>
							<input type="text" name="distance" value="<?php echo $hikking['distance']; ?>">
						</div>
						<div class="control-form">
							<label for="duration">Durée</label>
							<input type="time" name="duration" value="<?php echo $hikking['duration']; ?>">
						</div>
						<div class="control-form">
							<label for="height_difference">Dénivelé</label>
							<input type="text" name="height_difference" value="<?php echo $hikking['height_difference']; ?>">
						</div>
						<button type="submit" name="button">Envoyer</button>
					</form>
				<?php
				endif;
			else :
				?>
				connectez-vous
			<?php
				header('Location: ././login.php');
			endif; ?>
		</section>
	</main>
	<?php require('../views/footer.php'); ?>    
</body>

</html>