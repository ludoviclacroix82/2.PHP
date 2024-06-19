<?php
require('../controllers/auth.php');
require('../helphers/function.php');

session_start();
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

$checkin =  authentication($userName, $password);

$selectDifficulty = selectDifficulty(); // function dans helphers/function.php

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="../../assets/css/style.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
	<?php require('../views/menu.php'); ?>
	<main>
		<section>
			<?php if ($checkin == 'true') : ?>
				<form action="../controllers/addHikking.php" method="post">
					<div class="tools">
						<h1>Ajouter</h1>
						<a href="../../index.php">Liste des données</a>
					</div>
					<div class="control-form ">
						<label for="name">Name</label>
						<input type="text" class="name-input" name="name" value="">
					</div>

					<div class="control-form ">
						<label for="difficulty">Difficulté</label>
						<select name="difficulty">
							<?php foreach ($selectDifficulty as $difficulty) : ?>
								<option value="<?= $difficulty; ?>"><?= $difficulty; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="control-form ">
						<label for="distance">Distance</label>
						<input type="text" name="distance" value="">
					</div>
					<div class="control-form ">
						<label for="duration">Durée</label>
						<input type="time" name="duration" value="">
					</div>
					<div class="control-form ">
						<label for="height_difference">Dénivelé</label>
						<input type="text" name="height_difference" value="">
					</div>
					<button type="submit" name="button">Envoyer</button>
				</form>
			<?php
			else :
			?>
				connectez-vous
			<?php
				header('Location: ../public/login.php');
			endif; ?>
		</section>
	</main>
	<?php require('../views/footer.php'); ?> 
</body>

</html>