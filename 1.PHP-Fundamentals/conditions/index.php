<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conditions</title>
</head>

<body>
    <?php
    $temperature = 25;

    if ($temperature >= 15) {
        // code to execute if the condition results TRUE
        $clothes = "T-shirt";
        $should_i_wear_a_scarf = false;
    } else {
        // code to execute if the condition results FALSE
        $clothes = "Pull-over";
        $should_i_wear_a_scarf = true;
    }

    echo $clothes

    ?>
</body>

</html>