<?php

echo '<pre>';

//DRY
//Don't Repeat Yourself

//Tėvinė klasė (Parent class)
class PirmojiKlase {
    public $pasisveikinimas;
    public $kam;
    public $kas;

    public function __construct($pasisveikinimas, $kam, $kas = false) {
        $this->pasisveikinimas = $pasisveikinimas;
        $this->kam = $kam;
        $this->kas = $kas;
    }   

    public function setPasisveikinimas($data) {
        $this->pasisveikinimas = $data;
    }
}

$pirmoji = new PirmojiKlase('Labas', 'Pasauli');

//Dukterinė klasė (Child class)
class AntrojiKlase extends PirmojiKlase {
    public $siandien;

    public function __construct($data, $pasisveikinimas, $kam) {
        parent::__construct($pasisveikinimas, $kam);

        $this->siandien = $data;
    }
}

$antroji = new AntrojiKlase('2023-02-27', 'Hello', 'World');

$antroji->setPasisveikinimas('Goodbye');

var_dump($antroji);

$pirmoji->setPasisveikinimas('Viso');

var_dump($pirmoji);






// function pasisveikinimas($kas, $kam = 'Visi', $ka = 'Sveiki') {
//     if(!$kam)
//         $kam = 'Visi';

//     return $kas . $kam . $ka;
// }

// echo pasisveikinimas('Sveiki', false, 'Jums sakau aš');