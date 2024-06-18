<?php

require('../config/dbConfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($username) && !empty($password)) {
        try {
            // Connexion à la base de données et requête pour récupérer l'utilisateur
            $req = $bdd->prepare('SELECT * FROM user WHERE BINARY username = ?');
            $req->execute(array($username));
            $user = $req->fetch(PDO::FETCH_ASSOC);

            // Vérification du mot de passe à l'aide de password_verify()
            if ($user && password_verify($password, $user['password'])) {
                // Démarrage de la session et enregistrement des informations de session
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['password'] = $user['password']; // Exemple d'autres informations de session

                // Redirection vers une page après connexion réussie
                header('Location: ../../index.php');
                exit;
            } else {
                // Affichage d'une alerte si l'authentification échoue
                header('Location: ../public/login.php');
                 exit;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

?>
