<?php

//Įdedame composer autoloaderį
require_once 'vendor/autoload.php';

define('PREFIX', '/PHP-FULL-STACK-11-07-22/2023-03-08');

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

$klein->respond('GET', PREFIX . '/', function () {
    Controllers\Homepage::index();
});

$klein->respond('GET', PREFIX . '/category/[:id]', function ($request) {
    return Controllers\Homepage::byCategory($request);
});

$klein->dispatch();

// echo 'awd0';

// $page = isset($_GET['page']) ? $_GET['page'] : '';

// switch($page) {
//     case 'category':
//         Controllers\Homepage::byCategory($_GET['id']);
//         break;
//     default:
//         Controllers\Homepage::index();
// }
