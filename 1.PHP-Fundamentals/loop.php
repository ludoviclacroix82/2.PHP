<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop</title>
</head>

<body>
    <?php
    $pronouns = array('Je' => 'code', 'Tu' => 'codes', 'Il/Elle' => 'code', 'Nous' => 'codons', 'Vous' => 'codez', 'Ils/Elles' => 'codent');

    foreach ($pronouns as $key => $value) {
        echo $key . ' ' . $value . '<br>';
    };

    $a = 1;
    while ($a <= 120) {
        echo $a . ',';
        $a++;
    };
    echo '<br>';

    for ($i = 1; $i <= 120; $i++) {
        echo $i . ',';
    };
    echo '<br>';
    $firstname = array("Jean", "Marie", "Pierre", "Sophie", "Julie", "Thomas", "Emma", "Nicolas", "Laura", "Alexandre");

    foreach ($firstname as $value) {
        echo $value . '<br>';
    };

    $countrys = ["US" => "États-Unis", "BE" => "Belgique", "FR" => "France", "ES" => "Espagne", "BR" => "Brésil", "CH" => "Suisse", "IT" => "Italie", "PT" => "Portugal", "DE" => "Allemagne", "GB" => "Royaume-Uni"];

    ?>

    <select name='coutry'>
        <?php
            foreach ($countrys as  $keys => $country) {
                echo '<option value="'.$keys.'">'.$country.'</option>';
            }
        ?>
    </select>
</body>

</html>