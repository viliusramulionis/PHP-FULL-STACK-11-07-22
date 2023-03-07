<?php

//Įdedame composer autoloaderį
require_once 'vendor/autoload.php';

define('PREFIX', '/PHP-FULL-STACK-11-07-22/2023-03-07');

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

// echo '<pre>';
// print_r($_SERVER);

$klein = new \Klein\Klein();

$klein->respond('GET', '*', Controllers\Homepage::index());

$klein->respond('GET', PREFIX . '/category/[:id]', function ($request) {
    return Controllers\Homepage::byCategory($request);
});

$klein->dispatch();

// $page = isset($_GET['page']) ? $_GET['page'] : '';

// switch($page) {
//     case 'category':
//         Controllers\Homepage::byCategory($_GET['id']);
//         break;
//     default:
//         Controllers\Homepage::index();
// }
