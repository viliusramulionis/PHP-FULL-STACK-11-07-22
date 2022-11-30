function rand(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1) + min); 
}

console.log('Veikia external javascript failas');

const x = 10;

console.log('Pirmoji gauta reiksme: ' + x);

// x = 15;

// console.log(x);

let y = 15;

y = 20;

console.log('Antroji gauta reikšmė:', y);

y += 2;

console.log('Pliuso operatorius:', y);

y -= 10;

console.log('Minus operatorius:', y);

y *= 3;

console.log('Daugybos operatorius:', y);

y /= 2;

console.log('Dalybos operatorius:', y);

y++;

console.log('Inkrementinis operatorius:', y);

y--;

console.log('Dekrementinis operatorius:', y);

//Kondicinė logika

//Pirmas pavyzdys
// y = false;

// if(y) {
//     console.log('Kintamasis egzistuoja');
// } else {
//     console.log('Kintamasis neegzistuoja');
// }

//Antras pavyzdys

// let z = false;

// console.log(typeof z);

// if(!z) { //Bang operatorius
//     console.log('Z turi neigiamą reikšmę');
// }

//Trečias pavyzdys

// let w = 40;

// if(w != 40) {
//     console.log('Kintamasis w nėra lygus 40');
// } else {
//     console.log('Kintamasis yra lygus 40');
// }

//Ketvirtas pavyzdys 

// let pirmasSkaicius = 11;
// let antrasSkaicius = 11;

// if(pirmasSkaicius > antrasSkaicius) {
//     console.log('Pirmas skaicius yra didesnis');
// } else if(pirmasSkaicius === antrasSkaicius) {
//     console.log('Skaičiai yra lygus');
// } else {
//     console.log('Antras skaicius yra didesnis');
// }

// Kondicinės logikos "nestinimas"

// if(..Kazkas) {
//     if(...DarKazkas) {

//     } else {

//     }
// } else {

// }

//Penktas pavyzdys

// let pirmasSkaicius = 11;
// let antrasSkaicius = 11;

// if(pirmasSkaicius >= antrasSkaicius) {
//     console.log('Pirmas skaičius yra didesnis arba lygus antram skaičiui.');
// } else {
//     console.log('Antras skačius yra didesnis už pirmą skaičių.');
// }

//Stringai

const stringas = 'Lorem Ipsum is simply dummy text of the printing and typesetting'; 

console.log(stringas);

console.log('Ketvirtoji stringo raidė:', stringas[4]);

console.log('Stringo ilgis yra:', stringas.length);

let modifikuotasStringas = 'pridėtas tekstas iš priekio' + stringas + ' pridėtas tekstas iš galo';

//Pirmas variantas
// modifikuotasStringas = modifikuotasStringas.replaceAll('tekstas', 'z');
// modifikuotasStringas = modifikuotasStringas.replaceAll('simply', 'hardly');

// console.log(modifikuotasStringas);

//Antras Variantas
modifikuotasStringas = modifikuotasStringas.replaceAll('tekstas', 'z').replaceAll('simply', 'hardly');

console.log(modifikuotasStringas);

const randomSkaicius = rand(5, 150);

console.log('Atsitiktinis skaičius', randomSkaicius);