<?php
// Connexion à MySQL
$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function allClients($limite)
{

    global $bdd;

    $limitParam = ($limite != null) ? 'LIMIT ' . $limite : 'WHERE 1';;

    $query = 'SELECT * FROM clients ' . $limitParam;
    $clients = $bdd->query($query);

    return $clients;
}
function allShowTypes()
{

    global $bdd;

    $query = 'SELECT type FROM showTypes WHERE 1';
    $showTypes = $bdd->query($query);

    return $showTypes;
}
function clientsId(string $id)
{

    global $bdd;

    $query = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
    $query->execute(['id' => intval($id)]);
    $clients = $query->fetchAll(PDO::FETCH_ASSOC);

    return $clients;
}
function fidelityCLients()
{

    global $bdd;

    $query = 'SELECT lastName,firstName FROM clients WHERE card=1';
    $clients = $bdd->query($query);

    return $clients;
}
function clientsName(string $content)
{

    global $bdd;

    $query = $bdd->prepare('SELECT * FROM clients WHERE lastName LIKE :content');
    $query->execute(['content' => $content . '%']);
    $clients = $query->fetchAll(PDO::FETCH_ASSOC);

    return $clients;
}
function clientsNameSelect(string $lastName){

    global $bdd;

    $query = $bdd->prepare(
        'SELECT clients.*, cards.cardTypesId 
        FROM clients 
        JOIN cards 
        ON clients.cardNumber = cards.cardNumber 
        WHERE clients.lastName = :lastName');

    $query->execute(['lastName' => $lastName]);
    $clients = $query->fetchAll(PDO::FETCH_ASSOC);

    return $clients;
}

function show(){
    global $bdd;

    $query = 'SELECT title,performer, date, startTime FROM shows WHERE 1';
    $shows = $bdd->query($query);

    return $shows;
}

function showNameSelect(string $title){
    global $bdd;

    $query = $bdd->prepare('SELECT * FROM shows WHERE title = :title');
    $query->execute(['title' => $title]);
    $show = $query->fetchAll(PDO::FETCH_ASSOC);

    return $show;
}

function cardType(){
    global $bdd;

    $query = 'SELECT id, type FROM cardTypes WHERE 1';
    $cardtype = $bdd->query($query);

    return $cardtype;

}

function showType(){
    global $bdd;

    $query = 'SELECT * FROM showTypes WHERE 1';
    $showType = $bdd->query($query);

    return $showType;

}
function genres(){
    global $bdd;

    $query = 'SELECT * FROM genres WHERE 1';
    $genres = $bdd->query($query);

    return $genres;

}

function bookings(int $id){
    global $bdd;

    $query = $bdd->prepare('SELECT * FROM bookings WHERE id = :id');
    $query->execute(['id' => intval($id)]);
    $bookings = $query->fetchAll(PDO::FETCH_ASSOC);

    return $bookings;
}
