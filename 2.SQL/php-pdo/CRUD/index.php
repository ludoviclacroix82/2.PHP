<?php
require('./src/config/dbConfig.php');
require('./src/controllers/request.php');

try {

    /* Exercice 1 */
    $allClients = allClients(null);

    /* Exercice 2 */
    $showTypes = allShowTypes();

    /* Exercice 3 */
    $allClients20 = allClients(20);

    /* Exercice 4 */
    $fidelityCLient = fidelityCLients();

    /* Exercice 5 */
    $clientsName = clientsName('m');

    /* Exercice 6 */
    $shows = show();

    /* Exercice 7 */
    $allClientsFid = allClients(null);

    $cardType = cardType();
    $cardType2 = cardType();
    $showType = showType();
    $genres = genres();
    $genres2 = genres();
    $showType2 = showType();
    $genres3 = genres();
    $genres4 = genres();

    /* PART2: Exercice 4 */
    $clientSelect = clientsNameSelect('Perry');
    /* PART2: Exercice 5 */
    $showSelect = showNameSelect('Vestibulum accumsan');

} catch (PDOException $e) {

    echo "Erreur de connexion : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        .crud1 {
            display: none;
        }

        .form .control-form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <section class='crud1'>
        <div>
            <p>
                <?php foreach ($allClients as $client) : ?>
                    [<?= $client['lastName']; ?> - <?= $client['firstName']; ?>] -
                <?php endforeach; ?>
            </p>
        </div>
        <div>
            <p>
                <?php foreach ($showTypes as $type) : ?>
                    [<?= $type['type']; ?>] -
                <?php endforeach; ?>
            </p>
        </div>
        <div>
            <p>
                <?php foreach ($allClients20 as $client) : ?>
                    [<?= $client['lastName']; ?> - <?= $client['firstName']; ?>] -
                <?php endforeach; ?>
            </p>
        </div>
        <div>
            <p>
                <?php foreach ($fidelityCLient as $client) : ?>
                    [<?= $client['lastName']; ?> - <?= $client['firstName']; ?>] -
                <?php endforeach; ?>
            </p>
        </div>
        <div>
            <?php foreach ($clientsName as $clientName) : ?>
                <p>
                    Nom : *<?= $clientName['lastName']; ?>*<br>
                    Prénom : *<?= $clientName['firstName']; ?>*
                </p>
            <?php endforeach; ?>
        </div>
        <div>
            <?php foreach ($shows as $show) : ?>
                <p>
                    <?= $show['title'] ?> par <?= $show['performer'] ?> , le <?= date_format(new DateTime($show['date']), "d/m/Y") ?> à <?= date_format(new DateTime($show['startTime']), "H:i") ?> .
                </p>
            <?php endforeach; ?>
        </div>
        <div>
            <?php foreach ($allClientsFid as $clientFid) : ?>
                <p>
                    Nom : *<?= $clientFid['lastName']; ?>*<br>
                    Prénom : *<?= $clientFid['firstName']; ?>*<br>
                    Date de naissance : *<?= date_format(new DateTime($clientFid['birthDate']), "d/m/Y") ?>*<br>
                    Carte de fidélité : *<?= ($clientFid['cardNumber'] == null) ? 'Non' : 'Oui'; ?>*<br>
                    Numéro de carte : *<?= ($clientFid['cardNumber'] == null) ? '' : $clientFid['cardNumber']; ?>*
                </p>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="form">
        <div class='control-form'>
            <h2>Ajouter un Client</h2>
            <form action="./src/controllers/add.php?action=client" method="post">
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="birthDate">Date de naissance:</label>
                <input type="date" id="birthDate" name="birthDate" required>

                <label for="card">
                    <input type="checkbox" id="card" name="card"> Carte de fidélité
                </label>

                <label for="cardNumber">Numéro de carte de fidélité:</label>
                <input type="text" id="cardNumber" name="cardNumber">
                <select name="cardTypes">
                    <option value="0" disabled selected>types Crad </option>
                    <?php foreach ($cardType as $type) : ?>
                        <option value="<?= $type['id']; ?>"><?= $type['type']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Ajouter le client">
            </form>
        </div>
        <div class="control-form">
            <h2>Ajouter un Spectacle</h2>
            <form action="./src/controllers/add.php?action=show" method="post">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" required>

                <label for="performer">Artiste:</label>
                <input type="text" id="performer" name="performer" required>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="showTypesId">Type de spectacle:</label>
                <select name="showTypesId">
                    <option value="0" disabled selected>types Show </option>
                    <?php foreach ($showType as $type) : ?>
                        <option value="<?= $type['id']; ?>"><?= $type['type']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="firstGenresId">Genre 1:</label>
                <select name="firstGenresId">
                    <option value="0" disabled selected>types genres </option>
                    <?php foreach ($genres as $type) : ?>
                        <option value="<?= $type['id']; ?>"><?= $type['genre']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="secondGenreId">Genre 2:</label>
                <select name="secondGenreId">
                    <option value="0" disabled selected>types genres </option>
                    <?php foreach ($genres2 as $type2) : ?>
                        <option value="<?= $type2['id']; ?>"><?= $type2['genre']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="duration">Durée (minutes):</label>
                <input type="time" id="duration" name="duration" required>

                <label for="startTime">Heure de début:</label>
                <input type="time" id="startTime" name="startTime" required>

                <input type="submit" value="Ajouter le spectacle">
            </form>
        </div>
        <div class='control-form'>
            <h2>Update un Client</h2>
            <?php foreach ($clientSelect as $client): ?> 
            <form action="./src/controllers/update.php?action=client&id=<?= $client['id']; ?>" method="post">
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="lastName" value="<?= $client['lastName'];?>" required>

                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="firstName" value="<?= $client['firstName'];?>"required>

                <label for="birthDate">Date de naissance:</label>
                <input type="date" id="birthDate" name="birthDate" value="<?= $client['birthDate']; ?>"required>
                <label for="card">
                    <input type="checkbox" id="card" name="card" <?= ($client['card'] == 1) ? 'checked' : ''; ?>> Carte de fidélité
                </label>

                <label for="cardNumber">Numéro de carte de fidélité:</label>
                <input type="text" id="cardNumber" name="cardNumber" value="<?= $client['cardNumber'];?>">
                
                <input type="submit" value="Modifier le client">
            </form>
            <?php endforeach; ?>
        </div>
        <div class="control-form">
            <h2>Modifier un Spectacle</h2>
            <?php foreach($showSelect as $show) : ?>
            <form action="./src/controllers/update.php?action=show&id=<?= $show['id']; ?>" method="post">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" value="<?= $show['title']; ?>" required>

                <label for="performer">Artiste:</label>
                <input type="text" id="performer" name="performer" value="<?= $show['performer']; ?>" required>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?= $show['date']; ?>" required>

                <label for="showTypesId">Type de spectacle:</label>
                <select name="showTypesId">
                    <option value="0" disabled >types Show </option>
                    <?php foreach ($showType2 as $type) : 
                        $selected = ($show['showTypesId'] === $type['id'])?"selected":'';
                    ?>
                        <option value="<?= $type['id']; ?>" <?= $selected; ?>><?= $type['type']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="firstGenresId">Genre 1:</label>
                <select name="firstGenresId">
                    <option value="0" disabled >types genres </option>
                    <?php foreach ($genres3 as $type) : 
                        $selected = ($show['firstGenresId'] === $type['id'])?"selected":'';?>
                        <option value="<?= $type['id']; ?>" <?= $selected; ?>><?= $type['genre']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="secondGenreId">Genre 2:</label>
                <select name="secondGenreId">
                    <option value="0" disabled >types genres </option>
                    <?php foreach ($genres4 as $type2) : 
                        $selected = ($show['secondGenreId'] === $type['id'])?"selected":'';?>
                        <option value="<?= $type2['id']; ?>" <?= $selected; ?>><?= $type2['genre']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="duration">Durée (minutes):</label>
                <input type="time" id="duration" name="duration" value="<?= $show['duration']; ?>" required>

                <label for="startTime">Heure de début:</label>
                <input type="time" id="startTime" name="startTime" value="<?= $show['startTime']; ?>" required>

                <input type="submit" value="Ajouter le spectacle">
            </form>
            <?php endforeach; ?>
        </div>
    </section>
</body>

</html>