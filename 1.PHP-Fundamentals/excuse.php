<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excuse</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php
    $currentDate = date("d/m/Y");

    $nameChild = isset($_GET['nameChild']) ? $_GET['nameChild'] : null;
    $nameTeacher = isset($_GET['nameTeacher']) ? $_GET['nameTeacher'] : null;
    $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
    $reason = isset($_GET['reason']) ? $_GET['reason'] : null;
    $submit = isset($_GET['btnSubmit']) ? $_GET['btnSubmit'] : null;

    $msgError = '';
    $reasonList =  array(
        "null" => "------------",
        "illness" => "illness",
        "death" => "death of the pet (or a family member)",
        "activity" => "significant extra-curricular activity",
        "other" => "Public transportation was canceled"
    );

    $genderList = array(
        "Garçon" => "Garçon",
        "Fille" => "Fille"
    );

    $gendertitle = ($gender == 'Garçon') ? 'Mon' : 'Ma';

    $msgError .= ($nameChild == null) ? 'name (child) required <br>' : '';
    $msgError .= ($nameTeacher == null) ? 'name (teacher) required <br>' : '';
    $msgError .= ($gender == null) ? 'gender required <br>' : '';
    $msgError .= ($reason == null || $reason == 'null') ? 'reason required <br>' : '';

    switch ($reason) {
        case 'illness':
            $msg = '<p>Cher ' . $nameTeacher . '</p>' .
                '<p>' . $gendertitle . ' ' . $gender  . ' ' . $nameChild . ' , ne pourra pas assister au cours aujourd’hui. </p>' .
                '<p>Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.<br>' .
                'Pour tout complément d’informations, n’hésitez surtout pas à nous contacter.</p>';
            break;
        case 'other':
            $msg = '<p>Cher' . $nameTeacher . '</p>' .
                '<p>' . $gendertitle . ' ' . $gender  . ' ' . $nameChild . '  est arrivé en retard car il a loupé son car scolaire ce matin.</p>' .
                '<p>Ce mot d’excuse vous confirme que le retard de notre enfant s’explique bien par un problème de réveil qui a occasionné une non-prise du bus scolaire.' .
                'Nous veillerons à ce que cette situation ne se renouvelle pas.</p>' .
                '<p>Merci</p>';
            break;
        case 'activity':
            $msg = '<p>Cher' . $nameTeacher . '</p>' .
                '<p>Je vous écris pour informer que ' . $gendertitle . ' ' . $gender  . ' ne pourra pas assister à l\'ecole aujourd\'hui.</p>' .
                '<p>' . $nameChild . ' n\'est pas en mesure de venir en raison d\'une indisposition/situation personnelle imprévue.<br>' .
                ' Nous nous excusons pour tout inconvénient que cela pourrait causer et nous nous assurerons qu\'elle rattrape tout le travail manqué.</p>' .
                '<p>Merci de votre compréhension.</p>';
            break;
        case 'death':
            $msg = '<p>Cher ' . $nameTeacher . '</p>' .
                '<p>Je tiens à vous informer d\'une situation délicate qui nous affecte actuellement.<br> Malheureusement, [Nom de l\'animal ou du membre de la famille] est décédé(e) [préciser le moment, par exemple "hier soir"].</p>' .
                '<p>Ce décès nous touche profondément et nécessite notre présence et notre soutien mutuel en ces moments difficiles.</p>' .
                '<p>Par conséquent, ' . $gendertitle . ' ' . $gender  . ' ' . $nameChild . ' ne pourra pas assister aux cours .' .
                'Nous vous prions de bien vouloir excuser son absence et nous vous remercions pour votre compréhension dans cette situation éprouvante.</p>' .
                '<p>Cordialement</p>';
            break;
        default:
            $msg = '';
            break;
    }

    ?>
    <header>
        The Alibi Generator
    </header>
    <main>
        <aside>
            <form method="get" action="">
                <p>
                    <?php echo $msgError; ?>
                </p>
                <p>
                    <label>Gender (Child) : </label>
                    <?php
                    foreach ($genderList as $key => $value) {
                        $checked = ($key == $gender) ? "checked" : "";
                        echo '<input type="radio" name="gender" id="' . $key . '" value="' . $value . '" ' . $checked . '><label for="gender">' . $key . '</label>';
                    }
                    ?>
                </p>
                <p>
                    <label for="nameChild">name (child) : </label>
                    <input type="text" name="nameChild" id="nameChild" value="">
                </p>
                <p>
                    <label for="nameTeacher">name (teacher) : </label>
                    <input type="text" name="nameTeacher" id="nameTeacher" value="">
                </p>
                <p>
                    <label for="reason">reason : </label>
                    <select name="reason" id="reason">
                        <?php
                        foreach ($reasonList as $key => $value) {
                            $slected = ($key == $reason) ? "selected" : "";
                            echo '<option value="' . $key . '" ' . $slected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </p>
                <input type="submit" name='btnSubmit' value="Submit">
                </from>
        </aside>
        <section class='excuses'>
            <?php
            if ($submit == 'Submit' && ($nameChild != null && $nameTeacher != null && $gender != null &&  $reason != 'null')) {

                echo $msg . '<p> Fait le '. $currentDate.'</p>';
            }
            ?>
        </section>
    </main>
    <footer></footer>
</body>

</html>