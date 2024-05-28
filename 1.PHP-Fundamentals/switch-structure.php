<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch-structure</title>
    <style>
        form {
            width: 500px;
            border: 1px solid #000;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php

    $point = isset($_GET['point']) ? $_GET['point'] : null;
    $msg = '';

    if (isset($_GET['point']) != null) {
        switch ($point) {
            case ($point >= 0 && $point <= 4):
                $msg = "This work is really bad. What a dumb kid! ";
                break;
            case ($point > 5 && $point <= 9):
                $msg = "This is not sufficient. More studying is required.";
                break;
            case ($point == 10):
                $msg = "barely enough!";
                break;
            case ($point >= 11 && $point <= 14):
                $msg = "Not bad!";
                break;
            case ($point >= 15 && $point <= 18):
                $msg = "Bravo, bravissimo!";
                break;
            case ($point >= 19 && $point <= 20):
                $msg = "Too good to be true : confront the cheater!";
                break;
            default:
                $msg = '';
                break;
        }
    }

    echo $msg;
    ?>
    <form method="get" action="">
        <p>
            <label for="point">Point : </label>
            <input type="number" name="point" id="point" min="0" max="20">
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>