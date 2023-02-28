<?php

//Access modifiers:
//Public - Savybės ir metodai kurie gali būti matomi ir modifikuojami dukterinėse klasėse ir už jų ribų
//Private - Savybės ir metodai kurie yra prieinami tik tos klasės viduje
//Protected - Savybės kurių mpodifikavimas yra galimas tik metodų pagalba išorėje

echo '<pre>';

class PirmojiKlase {
    public $pasisveikinimas;
    public $kam;
    public $kas;
    private $vardas = 'Vilius';
    protected $pavarde = 'Ramulionis';

    public function __construct($pasisveikinimas, $kam, $kas = false,) {
        $this->pasisveikinimas = $pasisveikinimas;
        $this->kam = $kam;
        $this->kas = $kas;
    }   

    public function setPasisveikinimas($data) {
        $this->pasisveikinimas = $data;
    }

    public function modifyVardas($suffix) {
        $this->vardas = $suffix . ' '. $this->getVardas();

        return $this->vardas;
    }

    private function getVardas() {
        return $this->vardas;
    }

    public function getPavarde() {
        return $this->pavarde;
    }

    public function setPavarde($pavarde) {
        $this->pavarde = $pavarde;
    }
}

$pirmoji = new PirmojiKlase('Labas', 'Pasauli');

//Dukterinė klasė (Child class)
class AntrojiKlase extends PirmojiKlase {
    public $siandien;

    public function __construct($data, $pasisveikinimas, $kam) {
        parent::__construct($pasisveikinimas, $kam);

        $this->siandien = $data;
        $this->pasisveikinimas = 'Sveiki';
    }
}

$antroji = new AntrojiKlase('2023-02-27', 'Hello', 'World');

var_dump($antroji);

$antroji->pasisveikinimas = 'Hi';

var_dump($antroji);

echo $antroji->modifyVardas('Mr.');

echo $pirmoji->getPavarde();

$pirmoji->setPavarde('Jonaitis');

echo $pirmoji->getPavarde();

