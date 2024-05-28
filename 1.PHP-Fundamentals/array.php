<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>
    <?php
    $familyMember = ['Chiara', 'Cirelia', 'Ludovic'];
    print_r($familyMember);
    echo '<br>';

    $favouriteRecipes = ['Spaghetti', 'Steak', 'Hamburger', 'Hot Dog'];
    print_r($favouriteRecipes);
    echo '<br>';

    $favouriteFilms = ['Gladiator', 'Troie', 'Interstelar', 'Matrix'];
    echo $favouriteFilms[1];
    echo '<br>';

    $me = array(
        'age' => 42,
        'firstName' => 'Ludovic',
        'lastName'  => 'Lacroix',
        'seasonYear' => 'Summmer',
        'soccer' => true,
    );
    echo '<pre>';
    print_r($me);
    echo '</pre>';

    $me = array(
        'age' => 42,
        'firstName' => 'Ludovic',
        'lastName'  => 'Lacroix',
        'seasonYear' => 'Summmer',
        'soccer' => true,
        'favouriteFilms' => ['Gladiator', 'Troie', 'Interstelar', 'Matrix'],
    );
    echo '<pre>';
    print_r($me);
    echo '</pre>';

    $me['hobbies'][] =  'Soccer';
    echo '<pre>';
    print_r($me);
    echo '</pre>';

    $mother = array(
        'age' => 62,
        'seasonYear' => 'Summmer',
        'soccer' => false,
        'favouriteFilms' => ['Dirty Dancing'],
    );
    $mother['hobbies'][] = 'Cook';
    $mother['hobbies'][] = 'Reading';
    $mother['hobbies'][] = 'sewing';

    $me['mother'] =  $mother;
    echo '<pre>';
    print_r($me);
    echo '</pre>';

    $countMotherHobbies = count($me['mother']['hobbies']);
    $countMeHobbies = count($me['hobbies']);
    $countAddition = $countMotherHobbies + $countMeHobbies;


    echo $countMotherHobbies . '+' . $countMeHobbies . '=' . $countAddition;

    $me['hobbies'][] =  'Taxidermie ';
    $me['lastName'] = 'Durand';
    echo '<pre>';
    print_r($me);
    echo '</pre>';

    $soulMate = array(
        'age' => 41,
        'firstName' => 'Cirelia',
        'lastName'  => 'Inf',
        'seasonYear' => 'Summmer',
        'soccer' => true,
        'favouriteFilms' => ['Dirty Dnacing', 'After', 'Grease'],
        'hobbies' => ['Reading', 'Soccer'],
    );



    function arrayIntersection($array1, $array2)
    {

        $hobbies = [];

        if ($array1 == $array2)
            $hobbies[] = $array1;

        return $hobbies;
    }

    $possible_hobbies_via_intersection = array_intersect_ukey($me['hobbies'], $soulMate['hobbies'], "arrayIntersection");

    $possible_hobbies_via_merge = array_merge($me['hobbies'], $soulMate['hobbies']);
    echo '<pre>';
    print_r($possible_hobbies_via_intersection);
    print_r($possible_hobbies_via_merge);
    echo '</pre>';


    $web_development = array(
        'frontend'=>[],
        'backend' => [],
    );
    array_push( $web_development['frontend'],'xhtml');
    array_push( $web_development['backend'],'Ruby on Rails');
    array_push( $web_development['frontend'],'CSS');
    array_push( $web_development['frontend'],'Flash');
    array_push( $web_development['frontend'],'JavaScript');
    array_replace($web_development['frontend'],array(0 => 'html'));
    array_splice($web_development['frontend'], 2, 1);
    echo '<pre>';
    print_r( $web_development);
    var_dump($web_development);
    echo '</pre>';
    ?>
</body>

</html>