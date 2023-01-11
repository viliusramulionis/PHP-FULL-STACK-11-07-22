//Modulyje galime atlikti palaukimus be asinchroninės funkcijos
// const fb = await fetch('http://facebook.com');

// console.log(await fb.text());

//Jeigu duomenis norime paimti funkcijoje, async raktažodis yra būtinas
// async function launch() {
//     const fb = await fetch('http://facebook.com');

//     console.log(await fb.text());
// }

// launch();

// ./ Reiškia esamą direktoriją
// ../ Reiškia vieną direktoriją aukščiau
import { sum, multiply, vardas, pavarde, vardasPavarde } from './functions.js';
import { vardas as name, pavarde as surname } from './variables.js';
//Kuomet priimame standartine "default" exportuojamą reikšmę, importuodami nurodome savo sugalvotą kintamojo pavadinimą
import funkcijos from './functions.js';

console.log(sum(5, 10));

console.log(multiply(5, 10));

console.log(vardas, pavarde);

console.log(name, surname);

console.log(vardasPavarde());

console.log(funkcijos.deduct(10, 20));