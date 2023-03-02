<?php
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

// include 'models/Database.php';
// include 'models/Videos.php';
// include 'models/Categories.php';

// include 'controllers/Homepage.php';


// Automatinis klasių pridėjimas į kodą
function autoload_classes($klase) {
    $klase = str_replace('\\', '/', $klase);
    //echo $klase;
    if(is_file($klase . '.php'))
        include $klase . '.php';
}

spl_autoload_register('autoload_classes');

//Modelių iššaukimas
// $categories = new Categories();
// $videos = new Videos();

//print_r($videos->getDatabase());
//echo '<pre>';

//Video pridėjimas
// echo $videos->addRecord([
//     'name' => 'Geriausias video',
//     'video_url' => 'https://youtube.com',
//     'thumbnail_url' => 'https://youtube.com'
// ])->getRecordId();

//Visi video įrašai
// print_r($videos->getRecords());

//Video atnaujinimas
// $videos->updateRecord(4, [
//     'name' => 'Naujas įrašas',
//     'video_url' => 'https://youtube.com/1',
//     'thumbnail_url' => 'https://youtube.com/2'
// ]);

//Video ištrynimas
// $videos->deleteRecord(5);

// print_r($videos->updateRecord(8, [
//     'name' => 'Naujas įrašas',
//     'video_url' => 'https://youtube.com/1',
//     'thumbnail_url' => 'https://youtube.com/2'
// ])->getRecords());

//Kategorijos pridėjimas
// echo $categories->addRecord([
//     'name' => 'Fishing'
// ])->getRecordId();

//Kategorijos atnaujinimas
// $categories->updateRecord(4, [
//     'name' => 'Hunting',
// ]);

//Kategorijos ištrynimas
//$categories->deleteRecord(5);

//Visos kategorijos
//print_r($categories->getRecords());

//Routerio kūrimas

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) {
    case 'category':
        Controllers\Homepage::byCategory($_GET['id']);
        break;
    default:
        Controllers\Homepage::index();
}
