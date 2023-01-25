<?php
    //Konstantos deklaravimas
    define('VAISIAI', ['Obuoliai', 'Bananai', 'Abrikosai']);
    define('VARDAS', 'VILIUS');

    $zinute = 'Labas Pasauli';
    $black = true;

    $white = null;
    $deepBlue = 'class="deepBlue"';

    $dokumentai = true;
    $kedes = false;
    $rezultatas = 'Sandėlys tuščias';

    if($dokumentai AND $kedes) {
        $rezultatas = 'Šiuo metu sandėlyje turime dokumentų ir kėdžių';
    }

    // if($dokumentai OR $kedes) {
    //     $rezultatas = 'Šiuo metu sandėlyje turime dokumentų arba kėdžių';
    // }

    if($dokumentai XOR $kedes) {
        $rezultatas = 'Šiuo metu sandėlyje turime dokumentų arba kėdžių';
    }

    $list = '<ul>';

    for($i = 0; $i < 10; $i++) {
        $list .= '<li>' . $i . '</li>';
    } 

    $list .= '</ul>';

    $masyvas = [10, 30, 22, 18, 34, 15];

    $didziausiasSkaicius = max(...$masyvas);

    $maziausiasSkaicius = min($masyvas);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos ir operatoriai</title>
    <style>
        .dark {
            background: black;
            color: white;
        }

        .deepBlue {
            background: blue;
            color: white;
        }
    </style>
</head>
<!-- <body <?php echo $black ? 'class="dark"' : '' ?> > -->
<!-- <body <?= $black ? 'class="dark"' : '' ?>> -->
<body <?= $white ?? $deepBlue ?>>

    <!-- <h1><?php echo $zinute; ?></h1> -->
    <h1><?= $zinute ?></h1>

    <p><?= $rezultatas ?></p>

    <?= $list ?>

    <h3>Didžiausias skaičius</h3>
    <?= $didziausiasSkaicius; ?>

    <h3>Mažiausias skaičius</h3>
    <?= $maziausiasSkaicius; ?>

    <h3>Kokia tai reikšmė?</h3>

    <?php
        $kintamasis = true;

        if(is_array($kintamasis)) {
            echo 'Tai yra masyvas';
        }

        if(is_float($kintamasis)) {
            echo 'Tai yra skaičius po kablelio';
        }

        if(is_int($kintamasis)) {
            echo 'Tai yra sveikas skaičius';
        }

        if(is_bool($kintamasis)) {
            echo 'Tai yra boolean reikšmė';
        }

        if(is_string($kintamasis)) {
            echo 'Tai yra stringo reikšmė';
        }
    ?>

    <h3>Duomens tipas:</h3>

    <?= gettype($kintamasis) ?>

    <h3>Apvalinimas</h3>

    <?php
        //Skaičiaus pi generavimas
        //$pi = pi();
        //echo $pi;

        $digit = 3.5;

        echo round($digit, 0, PHP_ROUND_HALF_ODD);
    ?>

    <h3>Konstantos atvaizdavimas</h3>
    
    <?php 
        echo VARDAS;
    ?>

    <h3>Ciklai</h3>

    <?php
        //While ciklas
        // $i = 0;

        // while($i < 10) {
        //     echo 'Ciklas sukasi <br />';
        //     $i++;
        // }
        
        //Do While Ciklas
        // $i = 0;

        // do {
        //     echo 'Ciklas sukasi <br />';
        //     $i++;
        // } while($i < 10)

        //For Ciklas

        // for($i = 0; $i < 10; $i++) {
        //     echo 'Ciklas sukasi <br />';
        // }

        // https://www.php.net/manual/en/function.count.php
        //count()
        
        // for($i = 0; $i < count(VAISIAI); $i++) {
        //     echo VAISIAI[$i] . '<br />';
        // }

        // $masyvas = ['BMW', 'Audi', 'Toyota', 'Dodge'];

        // for($i = 0; $i < count($masyvas); $i++) {
        //     echo $masyvas[$i] . '<br />';
        // }

        $masyvas = ['BMW', 'Audi', 'Toyota', 'Dodge'];
        
        //Norint susigrąžinti tik reikšmę
        // foreach($masyvas as $reiksme) {
        //     echo $reiksme . '<br />';
        // }
        
        //Norint susigrąžinti reikšmę ir indeksą
        foreach($masyvas as $indeksas => $reiksme) {
            echo $reiksme .' kurio indeksas ' . $indeksas. '<br />';
        }
    ?>

    <h3>Switch</h3>

    <?php
        //Switch
        $reiksme = 10;

        if($reiksme === 1) {
            echo 'Reikšmė yra lygu vienetui';
        } else if($reiksme === 2) {
            echo 'Reikšmė yra lygu dvejetui';
        } else if($reiksme === 3) {
            echo 'Reikšmė yra lygu trejetui';
        } else if($reiksme === 4) {
            echo 'Reikšmė yra lygu ketvertui';
        } else {
            echo 'Reikšmė neatpažinta';
        }

        switch($reiksme) {
            case 1:
                echo 'Reikšmė yra lygu vienetui';
                break;
            case 2:
                echo 'Reikšmė yra lygu dvejetui';
                break;
            case 3:
                echo 'Reikšmė yra lygu trejetui';
                break;
            case 4:
                echo 'Reikšmė yra lygu ketvertui';
                break;
            default:
                echo 'Reikšmė neatpažinta';
        }
    ?>
</body>
</html>