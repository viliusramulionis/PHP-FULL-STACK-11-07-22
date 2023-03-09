<?php
session_start();

//Įdedame composer autoloaderį
require_once 'vendor/autoload.php';

/* 
    CRUD:
    CREATE
    READ
    UPDATE
    DELETE
    
    MVC:
    Model - Atsakingi už duomenų paėmimą iš duomenų bazės
    View - Šablonai kurie sukompiliuojami pagal perduodamą informaciją
    Controller - Kontroliuoja prieš tai buvusių dviejų sekcijų veiklą
*/

//Routerio kūrimas

$klein = new \Klein\Klein();

//Titulinis puslapis
$klein->respond('GET', '/', function () {
    Controllers\Homepage::index();
});

//Kategorijos puslapis
$klein->respond('GET', '/category/[:id]', function ($request) {
    return Controllers\Homepage::byCategory($request);
});

// Login Kelias (Route'as)
$klein->respond('GET', '/login', function () {
    return Controllers\Auth::loginIndex();
});

//Login duomenų priėmimas
$klein->respond('POST', '/login', function () {
    return Controllers\Auth::processLogin();
});

// Register Kelias (Route'as)
$klein->respond('GET', '/register', function () {
    return Controllers\Auth::registerIndex();
});

$klein->respond('POST', '/register', function () {
    return Controllers\Auth::processRegistration();
});

$klein->dispatch();


// $page = isset($_GET['page']) ? $_GET['page'] : '';

// switch($page) {
//     case 'category':
//         if($_SERVER['REQUEST_METHOD'] === 'POST') {
//             Controllers\Homepage::byCategory($_GET['id']);
//         } else {
//             Controllers\Homepage::byCategory($_GET['id']);
//         }
//         break;
//     default:
//         Controllers\Homepage::index();
// }
