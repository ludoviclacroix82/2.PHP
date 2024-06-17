<?php
require('./src/config/dbConfig.php');

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryMeteo = $bdd->query("SELECT * FROM Meteo");

} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-PDO</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <main>
        <section>
            <form method="post" action="./src/controllers/addCity.php" id="formCity">
                <input type="text" name="city" id="city" placeholder="nom de la ville" required>
                <input type="number" name="min" id="min" placeholder="Minimale" min="-80" max="300" required>
                <input type="number" name="max" id="max" placeholder="Maximale" min="-80" max="300" required>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Soumettre">
            </form>
        </section>
        <section>
            <form method="post" action="./src/controllers/deleteCity.php" id="formCity">
                <table>
                    <thead>
                        <tr>
                            <th>Delete</th>
                            <th>Ville</th>
                            <th>Temp Min</th>
                            <th>Temp Max</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($queryMeteo as $meteo) : ?>
                            <tr>
                                <td class="delete"><input type="checkbox" id="deleteCity" name="deleteCity[]" value="<?php echo $meteo['ville']; ?>" /></td>
                                <td><?php echo $meteo['ville']; ?></td>
                                <td class="number"><?php echo $meteo['bas']; ?></td>
                                <td class="number"><?php echo $meteo['haut']; ?></td>
                            </tr>
                        <?php endforeach;  ?>

                    </tbody>
                </table>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Delete">
            </form>
        </section>
    </main>
</body>

</html>
<?php
    //close connexion
    $queryMeteo = null;
    $bdd = null;
?>