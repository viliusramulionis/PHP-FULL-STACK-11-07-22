<?php
    //PHP - loosely based programming language
    $kintamasis = '<h1>Tai yra kintamojo reikšmė</h1>';
    echo $kintamasis;
    //Reikšmės keitimas
    $kintamasis = 10;
    echo '<h2>' . $kintamasis . '</h2>';
    //Inkrementas
    $kintamasis++;
    echo '<h2>' . $kintamasis . '</h2>';
    //Dekrementas
    $kintamasis--;
    echo '<h2>' . $kintamasis . '</h2>';
    //Atimtis
    $kintamasis = $kintamasis - 20;
    echo '<h2>' . $kintamasis . '</h2>';
    //Sudėtis
    $kintamasis = $kintamasis + 50;
    echo '<h2>' . $kintamasis . '</h2>';
    //Daugyba
    $kintamasis = $kintamasis * 2;
    echo '<h2>' . $kintamasis . '</h2>';
    //Dalyba
    $kintamasis = $kintamasis / 2;
    echo '<h2>' . $kintamasis . '</h2>';

    $kintamasis = 10;

    //Atimtis iš esamojo kintamojo
    $kintamasis -= 20;
    echo '<h2>' . $kintamasis . '</h2>';
    //Sudėtis su esamuoju kintamuoju
    $kintamasis += 50;
    echo '<h2>' . $kintamasis . '</h2>';
    //Daugyba su esamuoju kintamuoju
    $kintamasis *= 2;
    echo '<h2>' . $kintamasis . '</h2>';
    //Dalyba iš esamojo kintamojo
    $kintamasis /= 2;
    echo '<h2>' . $kintamasis . '</h2>';

    $pirmasis = 5;
    $antrasis = 80;

    echo '<h3>Rezultatas: ' . ($pirmasis - $antrasis) * 3 . '</h3>';

    $trecias = 3.587;

    echo '<h4>' . $trecias . '</h4>';

    //Klasikinis masyvo aprašymas
    $masyvas = array('raktinis_zodis' => 'jo reikšmė');

    //print_r funkcija skirta atvaizduoti masyvą
    print_r($masyvas);

    echo '<br />';

    var_dump($masyvas);

    echo '<br />';

    $masyvas = array(15, 20, 30, 10.2, 18);

    var_dump($masyvas);

    echo '<br />';

    $masyvas = [15, 20, 30, 10.2, 18];

    var_dump($masyvas);

    echo '<br />';

    $masyvas = ['pirmas_raktas' => 15, 1 => 20, true => 30, 3 => 10.2, 4 => 18];
    
    var_dump($masyvas);

    echo '<br />';

    echo $masyvas['pirmas_raktas'];

    echo '<br />';

    unset($masyvas['pirmas_raktas']);

    var_dump($masyvas);

    echo '<br />';

    $masyvas[1] = 'Pakeista reikšmė';

    var_dump($masyvas);

    $raktas = 3;

    echo '<br />';

    $masyvas[$raktas] = 'Kintamojo pagalba surastas elementas';

    var_dump($masyvas);    

    $masyvas[] = 'Tai nauja pridėta reikšmė';

    echo '<br />';

    var_dump($masyvas);    

    $masyvas['raktažodis'] = 'Tai nauja pridėta reikšmė su raktažodžiu';

    echo '<br />';

    var_dump($masyvas);    

    //For ciklas su php
    for($i = 0; $i < 100; $i++) {
        echo $i . ' cikle aprašyta eilutė ir sugeneruotas skaičius: ' . rand(0, 500) . ' <br />';
    }
?>
