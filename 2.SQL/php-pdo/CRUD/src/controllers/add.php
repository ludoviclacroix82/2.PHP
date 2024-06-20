<?php
require('../config/dbConfig.php');
// Connexion à MySQL
$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'client':
        addCLient();
        break;
    case 'show':
        addShow();
        break;
    default:
        break;
}

/** PART2: Exercice 1 & 2  */
function addClient()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $lastName = securityInput($_POST['lastName']);
        $firstName = securityInput($_POST['firstName']);
        $birthDate = securityInput($_POST['birthDate']);
        $card = isset($_POST['card']) ? 1 : 0;
        $cardNumber = $card ? securityInput($_POST['cardNumber']) : null;
        $cardTypes = $card ? securityInput($_POST['cardTypes']) : null;

        try {
            $data = [
                'lastName' => $lastName,
                'firstName' => $firstName,
                'birthDate' => $birthDate,
                'card' => intval($card),
                'cardNumber' => $cardNumber,
            ];

            $insertQuery = "INSERT 
                INTO clients(lastName, 
                            firstName, 
                            birthDate, 
                            card,
                            cardNumber) 
                VALUES(:lastName,
                       :firstName, 
                      :birthDate, 
                      :card, 
                      :cardNumber)";

            $query = $bdd->prepare($insertQuery);
            $query->execute($data);

            /*  PART2: Exercice 2*/
            if ($cardTypes != null)
                addTypeCard($cardNumber, $cardTypes);

            echo "Nouveau Client ajouté avec succès";
        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

function addTypeCard(int $numCrad, int $typeCrad)
{
    global $bdd;
    try {
        $data = [
            'cardNumber' => intval($numCrad),
            'cardTypesId' => intval($typeCrad),
        ];

        $insertQuery = "INSERT 
            INTO cards(cardNumber, 
                        cardTypesId) 
            VALUES(:cardNumber,
                   :cardTypesId)";

        $query = $bdd->prepare($insertQuery);
        $query->execute($data);

        echo "Nouvel carte ajouté avec succès";
    } catch (PDOException $e) {

        echo "Erreur de connexion : " . $e->getMessage();
    }
}


function addShow()
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
            ];

            $insertQuery = "INSERT 
                INTO shows(title,
                    performer,
                    date,
                    showTypesId,
                    firstGenresId,
                    secondGenreId,
                    duration,
                    startTime)
                VALUES (:title, 
                    :performer, 
                    :date, 
                    :showTypesId, 
                    :firstGenresId, 
                    :secondGenreId, 
                    :duration, 
                    :startTime)";

            $query = $bdd->prepare($insertQuery);
            $query->execute($data);

            echo "Nouveau spectacle ajouté avec succès";
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
