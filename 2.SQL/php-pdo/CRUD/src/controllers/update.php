<?php
require('../config/dbConfig.php');
// Connexion à MySQL
$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'client':
        updateClient($id);
        break;
    case 'show':
        updateShow($id);
        break;

    default:
        break;
}

function updateClient($id)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $lastName = securityInput($_POST['lastName']);
        $firstName = securityInput($_POST['firstName']);
        $birthDate = securityInput($_POST['birthDate']);
        $card = isset($_POST['card']) ? 1 : 0;
        $cardNumber = $card ? securityInput($_POST['cardNumber']) : null;

        try {
            $data = [
                'lastName' => $lastName,
                'firstName' => $firstName,
                'birthDate' => $birthDate,
                'card' => intval($card),
                'cardNumber' => $cardNumber,
                'id' => $id
            ];

            $updateQuery = 'UPDATE clients 
                SET id=:id,
                    lastName=:lastName,
                    firstName=:firstName,
                    birthDate=:birthDate,
                    card=:card,
                    cardNumber=:cardNumber
                WHERE id = :id';

            $query = $bdd->prepare($updateQuery);
            $query->execute($data);

            echo "modification  du Client avec succès";
        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

function updateShow($id)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $title = securityInput($_POST['title']);
        $performer = securityInput($_POST['performer']);
        $date = securityInput($_POST['date']);
        $showTypesId = securityInput($_POST['showTypesId']);
        $firstGenresId = securityInput($_POST['firstGenresId']);
        $secondGenreId = securityInput($_POST['secondGenreId']);
        $duration = securityInput($_POST['duration']);
        $startTime = securityInput($_POST['startTime']);

        try {
            $data = [
                'title' => $title,
                'performer' => $performer,
                'date' => $date,
                'showTypesId' => intval($showTypesId),
                'firstGenresId' => intval($firstGenresId),
                'secondGenreId' => intval($secondGenreId),
                'duration' => $duration,
                'startTime' => $startTime,
                'id' => $id
            ];

            $insertQuery = 'UPDATE shows 
            SET id=:id,
                title=:title,
                performer=:performer,
                date=:date,
                showTypesId=:showTypesId,
                firstGenresId=:firstGenresId,
                secondGenreId=:secondGenreId,
                duration=:duration,
                startTime=:startTime
            WHERE id=:id';

            $query = $bdd->prepare($insertQuery);
            $query->execute($data);

            echo "Modification du  spectacle  avec succès";
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

function securityInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
