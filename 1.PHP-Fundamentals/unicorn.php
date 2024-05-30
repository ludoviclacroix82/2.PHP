<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unicorn</title>
</head>

<body>
    <?php
    $youAre = isset($_GET['areYou']) ? $_GET['areYou'] : null;
    $picture = '';

    switch ($youAre) {
        case 'humain':
            $picture = "https://media.giphy.com/media/3o7WTPx44NhnoYkNVe/giphy.gif?cid=ecf05e4714hz467bh7y603f5izdizgfb4q5ntomjva6nc9v8&ep=v1_gifs_search&rid=giphy.gif&ct=g";
            break;
        case 'cat':
            $picture = "https://media.giphy.com/media/nR4L10XlJcSeQ/giphy.gif?cid=790b7611xhiyetg3i9m0ncujij5glgagldy87646ix6dgry3&ep=v1_gifs_search&rid=giphy.gif&ct=g";
            break;
        case 'unicorn':
            $picture = "https://media.giphy.com/media/bmsCgWQEH9txC/giphy.gif?cid=ecf05e478s3sjbc4uea8pat01odb1luve2uasswbh9tfu4uy&ep=v1_gifs_search&rid=giphy.gif&ct=g";
            break;
        default:
            $picture = null;
            break;
    }
    ?>
    <form method="get" action="">
        <label for="areYou">Are you ?</label>
        <select name="areYou" id="areYou">
            <option value="null" selected>-------</option>
            <option value="humain">Humain</option>
            <option value="cat">Cat</option>
            <option value="unicorn">Unicorn</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    <p>
        <?php
            if($picture != null){
                echo '<img src="'.$picture.'" alt="'. $youAre.'" >';
            }
        ?>
    <p>
</body>

</html>