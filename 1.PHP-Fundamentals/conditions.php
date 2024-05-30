<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conditions</title>
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
    /**
     * Series of exercises on PHP conditional structures.
     */

    // 1.1 Clean your room Exercise 
    $room_is_filthy = false;
    function cleanup_room($room_is_filthy)
    {
        if (!$room_is_filthy) {
            echo "Yuk, Room is dirty : let's clean it up !";
            echo "<br>Room is now clean!<br>";
            $room_is_filthy = false;
        } else {
            echo "<br>Nothing to do, room is neat.<br>";
        }
    }

    cleanup_room($room_is_filthy);


    // 1.2 Clean your room Exercise, improved

    // Create the array of possible states
    $possible_states = ["filthy", "dirty", "clean"];

    // When testing, change the index value to navigate to the possible array values
    $room_filthiness = $possible_states[2];

    if ($room_filthiness == "filthy") {
        echo "Yuk, Room is Disgusting! Let's clean it up !";
    } else if ($room_filthiness == "dirty") {
        echo "Yuk, Room is dirty : let's clean it up !";
        // ...
    } else {
        echo "<br>Nothing to do, room is neat.";
    }

    // 2. "Different greetings according to time" Exercise

    $now = date("H:i"); // How to get the current time in PHP ? Google is your friend ;-)

    echo "<br>" . $now;

    // Test the value of $now and display the right message according to the specifications.
    if ($now >= '05:00' && $now <= '09:00') {
        echo "Good morning !";
    } else if ($now >= '09:01' && $now <= '12:00') {
        echo "Good day !";
    } else if ($now >= '12:01' && $now <= '16:00') {
        echo "Good afternoon !";
    } else if ($now >= '16:01' && $now <= '21:00') {
        echo "Good evening !";
    } else {
        echo "Good night !";
    }

    echo "<br><br><br>";

    $age = isset($_GET['age']) ? $_GET['age'] : 0;
    $genre = isset($_GET['genre']) ? $_GET['genre'] : '';
    $welkom = (isset($_GET['lang']) && $_GET['lang'] == 'yes') ? 'Hello' : "Aloha";

    if (isset($_GET['age']) && isset($_GET['genre']) && isset($_GET['lang'])) {
        if ($age > 0 && $age < 12) {
            echo $welkom . " " . $genre . " kid!";
        } else if ($age >= 12 && $age < 18) {
            echo $welkom . " " . $genre . " Teen!";
        } else if ($age >= 18 && $age < 115) {
            echo $welkom . " " . $genre . " Adult !";
        } else if ($age >= 115) {
            echo "Wow! Still alive ? Are you a robot, like me ? Can I hug you ?";
        }
    }


    ?>
    <form method="get" action="">
        <label for="age">Your Age ? </label>
        <input type="number" name="age">
        <label for="genre"> your sex ?</label>
        <input type="radio" name="genre" id="Woman" value="Miss"><label for="Woman"> Woman</label>
        <input type="radio" name="genre" id="Man" value="Mister"><label for="Man"> Man</label>
        <label for="language"> Do you speak English ?</label>
        <input type="radio" name="lang" id="yes" value="yes"><label for="yes"> Yes</label>
        <input type="radio" name="lang" id="no" value="no"><label for="no"> No</label>
        <input type="submit" name="submit" value="Greet me now">
    </form>
    <?php

    $name = (isset($_GET['name'])) ? $_GET['name'] : '';
    $age =  (isset($_GET['age'])) ? $_GET['age'] : '';
    $gender = (isset($_GET['gender'])) ? $_GET['gender'] : '';
    $msg = "! Sorry you don't fit the criteria";

    if (isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {

        if (($age >= 21 && $age <= 40) && $gender == 'Woman') {

            $msg = "Welcome " . $name . " to the team !";
        }
        echo "<p>" . $msg . "</p>";
    }

    ?>
    <form method="get" action="">
        <p>
            <label for="name">Name : </label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <label for="age">Age : </label>
            <input type="number" name="age" id="age" min="0">
        </p>
        <p>
            <label for="gender">Gender : </label>
            <input type="radio" name="gender" id="Woman" value="Woman"><label>Woman</label>
            <input type="radio" name="gender" id="Man" value="Man"><label>Man</label>
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php

    $point = isset($_GET['point']) ? $_GET['point'] : null;

    if ($point != null && $point <= 4) {
        echo "This work is really bad. What a dumb kid! ";
    } else if ($point > 5 && $point <= 9) {
        echo "This is not sufficient. More studying is required.";
    } else if ($point == 10) {
        echo "barely enough!";
    } else if ($point >= 11 && $point <= 14) {
        echo "Not bad!";
    }else if ($point >= 15 && $point <= 18) {
        echo "Bravo, bravissimo!";
    }else if ($point >= 19 && $point <= 20) {
        echo "Too good to be true : confront the cheater!";
    }

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