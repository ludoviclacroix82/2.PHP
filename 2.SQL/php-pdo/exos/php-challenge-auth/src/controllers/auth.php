<?php
require_once('/var/www/dev/2.The-Hill/2.PHP/2.SQL/php-pdo/exos/php-challenge-auth/src/config/dbConfig.php');


function authentication(string $userName, string $password)
{
    global $bdd;
    try {
        $req = $bdd->prepare('SELECT * FROM user WHERE username = ?');
        $req->execute(array($userName));
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if ($user && $password === $user['password']){
            return 'true'; 
        } else {
            return 'false'; 
        }
    } catch (PDOException $e) {
        throw new Exception("Erreur d'authentification : " . $e->getMessage());
        return false;
    }
}
?>
