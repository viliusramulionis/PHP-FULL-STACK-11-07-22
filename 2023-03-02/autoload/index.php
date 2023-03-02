<?php

// include 'passengers/A.php';
// include 'busses/sounds/products/C.php';
// include 'busses/A.php';
// include 'busses/B.php';

spl_autoload_register(function($klase) {    
    echo $klase .'<br />';
    if(is_file($klase . '.php'))
        include $klase . '.php';
});

// Passengers\A::index() . '<br />';
// Busses\A::index() . '<br />';
// Busses\B::index() . '<br />';
// Busses\Sounds\Products\C::index();

echo Busses\B::index() . '<br />';
