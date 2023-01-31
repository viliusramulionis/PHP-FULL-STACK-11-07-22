<?php

$suma = 109.99;
$vardas = 'Vardeni Pavardeni';

$string = "Sveiki, {$vardas}. Jūsų mokėtina suma: {$suma} <br />";

//echo $string;

$html = "<div class='stringas'>{$string}</div>";

if($suma > 100) : 
    echo 'Suma yra didesnė nei 100<br />';
endif;

//printf() funkcija
//https://www.php.net/manual/en/function.printf.php

printf('PRINTF Sako: Sveiki, %s. Jūsų mokėtina suma: %s', $vardas, $suma);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML printing</title>
</head>
<body>
    <?= $html ?>

    <?php if($suma > 100) : ?>
        <div>Suma yra didesnė nei 100</div>
    <?php else : ?>
        <div>Suma yra mažesnė nei 100</div>
    <?php endif; ?>

    <?php for($i = 0; $i < 20; $i++) : ?>
        <div>Ciklas sukasi <?= $i ?> kartą</div>
    <?php endfor; ?>
</body>
</html>