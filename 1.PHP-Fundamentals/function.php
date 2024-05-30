<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>

    <style>
        .error {
            width: clamp(50px, 200px, 350px);
            color: red;
            padding: 10px;
            border: 1px solid #000;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    $paragraph = 'According to a researcher (sic) at Cambridge University , it doesn\'t matter in what order the letters in a word are, the only important thing is that the first and last letter be at the right place. The rest can be a total mess and you can still read it without problem. This is because the human mind does not read every letter by itself but the word as a whole .';
            
    /**
     * splitParagraph split chaque mot dans le paragraph
     * melange les lette de chaque mot 
     * @param  mixed $paragraph
     * @return void
     */
    function splitParagraph(string $paragraph)
    {
        $words = explode(" ", $paragraph);
        $strShuffle = '';

        foreach ($words as $word) {
            $strShuffle .= str_shuffle($word) . ' ';
        }
        return $strShuffle;
    }
    echo splitParagraph($paragraph);
    echo '<br>';
    function firstLetterMaj(string $text)
    {
        return ucfirst($text);
    }

    $text = 'hello world!';
    echo firstLetterMaj($text);
    echo '<br>';

    /**
     * dateFormat : formate une date en fonction des params
     *
     * @param  mixed $date
     * @param  mixed $format : format date voulue ex ('d-m-Y H:i:s')
     * @return void
     */
    function dateFormat(object $date, string $format)
    {

        $dateF = $date->format($format);
        return $dateF;
    }
    $date = new DateTime;
    $year = dateFormat($date, 'Y');
    $dateCurrent = dateFormat($date, 'd-m-Y H:i:s');
    echo $year;
    echo '<br>';
    echo $dateCurrent;

    /**
     * sum fait une somme de 2 valeur
     *
     * @param  mixed $num1 valeur
     * @param  mixed $num2 valeur
     * @return void
     */
    function sum($num1, $num2)
    {

        if (is_numeric($num1) && is_numeric($num2))
            $result = $num1 + $num2;
        else
            $result = 'Error: argument is the not a number.';
        return $result;
    }
    echo '<br>';
    echo sum(14.5, 21);
    echo '<br>';
    echo sum(14.5, 't');
    echo '<br>';

    function acronym(string $text)
    {
        $resultAcronym = '';
        $words = explode(' ', $text);
        foreach ($words as $word) {
            $resultAcronym  .= ucfirst($word[0]);
        }
        return $resultAcronym;
    }
    echo acronym('In code we trust!');
    echo '<br>';

    /**
     * replace des caratere dans une chaine de caracteres 
     *
     * @param  mixed $text
     * @param  mixed $oldReplace
     * @param  mixed $newReplace
     * @return void
     */
    function replace(string $text, string $oldReplace, string $newReplace)
    {
        return str_replace($oldReplace, $newReplace, $text);
    }
    $textArray = ["caecotrophie", "chaenichthys", "microsphaera", "sphaerotheca"];
    foreach ($textArray as  $value) {
        echo str_replace('ae', 'æ', $value) . ' , ';
    }
    echo '<br>';
    $textArray = ['cæcotrophie', 'chænichthys', 'microsphæra', 'sphærotheca'];
    foreach ($textArray as  $value) {
        echo str_replace('æ', 'ae', $value) . ' , ';
    }
    echo '<br>';

    /**
     * feedback :: Crée un div pour message 
     *
     * @param  mixed $message le message a afficher
     * @param  mixed $cssClass le nom de class css
     * @return void
     */
    function feedback(string $message, string $cssClass)
    {

        $elementHtml = '<div class="' . $cssClass . '">' . $message . '</div>';
        return $elementHtml;
    }
    echo feedback("Incorrect email address", "error");
    echo '<br>';
    
    /**
     * generatorMdp creation de password [a - 9]
     * creation de 2 sections : 1er de (1-5)caractère(s) 2eme (7-15)caractères
     * @return void
     */
    function generatorMdp()
    {
        $mdp = '';

        $random1 = rand(1, 5);
        $random2 = rand(7, 15);
        $randomArray = [$random1, $random2];

        $strArray = range('a', 'z');
        $intArray = range(0, 9);

        $arrayMdp = array_merge($strArray, $intArray);

        foreach ($randomArray as $value) {
            for ($i = 1; $i <= $value; $i++) {
                $random = rand(1, count($arrayMdp));
                $randomMaj = rand(0,1);
                if($randomMaj == 0)
                    $mdp .= ucfirst($arrayMdp[$random-1]);
                else
                $mdp .= $arrayMdp[$random-1];
            }
        }
        return $mdp;
    }

    echo 'Generate a new word: <br>';
    echo(generatorMdp());
    echo '<br>';
    
    /**
     * calculateConeVolume ::  calcule le volume d'un cone
     *
     * @param  mixed $ray :: le rayon
     * @param  mixed $height :: la hauteur 
     * @return void
     */
    function calculateConeVolume(float $ray, float $height){
         $volume = $ray * $ray * 3.14 * $height * (1/3);
         $volumeFormat = number_format($volume, 2, '.', '');

        return 'The volume of a cone which ray is '.$ray.' and height is '.$height.' :  '. $volumeFormat .' cm<sup>3</sup>';
    }
    echo calculateConeVolume(5,2);
    ?>
</body>

</html>