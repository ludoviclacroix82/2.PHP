<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'challenge-auth');
define('DB_USER', 'phpmyadmin');
define('DB_PASSWORD', 'root');

// Connexion à MySQL
$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>