import { randomName } from './helpers/names.js';

export function sum(a, b) {
    return a + b;
}

export function deduct(a, b) {
    return a - b;
}

export function divide(a, b) {
    return a / b;
}

export function multiply(a, b) {
    return a * b;
}

export const vardas = randomName.split(' ')[0];

export const pavarde = randomName.split(' ')[1];

const firstName = 'Algirdas';

const lastName = 'Jonušis';

export function vardasPavarde() {
    return firstName + ' ' + lastName;
}

export default { sum, deduct, divide, multiply, vardas, pavarde, vardasPavarde }