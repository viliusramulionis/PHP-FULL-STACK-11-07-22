<?php

namespace Busses;

use \Passengers\A as PassengerA;
use \Busses\Sounds\Products\C as ProductsC;

class B {
    public static function index() {
        //return A::index();
        //return \Passengers\A::index();

        //return new \DateTime('2023-03-02');

        //echo ProductsC::index() .'<br />';

        echo PassengerA::index();
        echo A::index();
    }
}