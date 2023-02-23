<?php

class Klase {
    //Savybės (property)
    public $savybe = 'Labas Pasauli!';
    //Konstantos aprašymas
    const URL = 'https://google.com';

    //Prieigos modifikatoriai (access modifiers)
    //public - Viešas prieinamumas
    //private
    //protected

    //Automatomatiškai inicijuojamas metodas po klasės paleidimo
    function __construct($hello) {
        if($hello)
            $this->savybe = $hello;
    }

    //Metodai (methods)
    public function funkcija() {
        $this->savybe = 'Paskaita prasidėjo!';
    }

    public function adresas() {
        //self raktažodis nurodo kreipimąsi į klasę
        //Scope resolution operatorius - "::"
        return file_get_contents(self::URL);
    }
}

//Klasės iššaukimas ir instancijos (instance) grąžinimas
$klase = new Klase('Konstruktorius suveikė');
$klase1 = new Klase(false);
$klase2 = new Klase('Šiandien žiniose');

//Savybės iškvietimas vykdomas su arrow operatoriumi
echo $klase->savybe;

//Metodo iškvietimas
echo $klase->funkcija();

//Konstantos susigrąžinimą iš klasės
echo '<br />' . Klase::URL;
echo '<br />' . $klase::URL;

//Google.com duomenų paėmimas
//echo $klase->adresas();

// echo '<pre>';
// var_dump($klase);
// var_dump($klase1);
// var_dump($klase2);

//Statinės savybės ir metodai
echo '<h2>Statinės savybės ir metodai</h2>';

class StatineKlase {
    //Inkapsuliacija - Duomenų slėpimas

    public static $vardas = '<h4>Vilius</h4>';

    public static function keistiVarda() {
        self::$vardas = '<h4>Adomas</h4>';
    }

    public $pavarde;

    public function __construct($pavarde) {
        $this->pavarde = $pavarde;
    }
}

echo StatineKlase::$vardas;

StatineKlase::keistiVarda();

echo StatineKlase::$vardas;

StatineKlase::$vardas = '<h4>Giedrius</h4>';

$klase1 = new StatineKlase('Petraitis');
$klase2 = new StatineKlase('Adomaitis');
$klase3 = new StatineKlase('Jonaitis');

echo '<pre>';

var_dump($klase1);
var_dump($klase2);
var_dump($klase3);

$klase1::$vardas = '<h4>Alisa</h4>';

echo $klase2::$vardas;