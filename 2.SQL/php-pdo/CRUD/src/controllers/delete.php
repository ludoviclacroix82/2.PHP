<?php
require('../config/dbConfig.php');
// Connexion à MySQL
$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'clientAll':
        deleteClientAll();
        break;
    case 'bookingAll':
        deleteBookingstAll();
        break;
    case 'ticketsAll':
        deletetTicketsAll();
        break;
    default:
        break;
}


function  deleteClientAll()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $idAllClient  = isset($_POST['id']) ? $_POST['id'] : '';

        foreach ($idAllClient as  $id) {
            $data = [
                'id' =>  htmlspecialchars(trim($id)),
            ];
            $queryDelete = "DELETE FROM clients WHERE id = :id";
            $query = $bdd->prepare($queryDelete);
            $query->execute($data);
        }

        try {
        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}
function  deleteBookingstAll()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $idAllBookings  = isset($_POST['id']) ? $_POST['id'] : '';

        foreach ($idAllBookings as  $id) {
            $data = [
                'id' =>  htmlspecialchars(trim($id)),
            ];
            $queryDelete = "DELETE FROM bookings WHERE clientId = :id";
            $query = $bdd->prepare($queryDelete);
            $query->execute($data);
        }

        try {
        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

function  deletetTicketsAll()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        global $bdd;

        $idTickets  = isset($_POST['id']) ? $_POST['id'] : '';

        var_dump($idTickets);

        foreach ($idTickets as  $id) {
            $data = [
                'id' =>  htmlspecialchars(trim($id)),
            ];
            $queryDelete = "DELETE FROM tickets WHERE id = :id";
            $query = $bdd->prepare($queryDelete);
            $query->execute($data);
        }

        try {
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
