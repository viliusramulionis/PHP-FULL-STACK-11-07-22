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

include 'models/Database.php';
include 'models/Videos.php';
include 'models/Categories.php';

$categories = new Categories();
$videos = new Videos();

//print_r($videos->getDatabase());
echo '<pre>';

//Įrašo pridėjimas
// echo $videos->addRecord([
//     'name' => 'Geriausias video',
//     'video_url' => 'https://youtube.com',
//     'thumbnail_url' => 'https://youtube.com'
// ])->getRecordId();

// print_r($videos->getRecords());

//Įrašo atnaujinimas
// $videos->updateRecord(4, [
//     'name' => 'Naujas įrašas',
//     'video_url' => 'https://youtube.com/1',
//     'thumbnail_url' => 'https://youtube.com/2'
// ]);

//Įrašo ištrynimas
// $videos->deleteRecord(5);

print_r($videos->updateRecord(8, [
    'name' => 'Naujas įrašas',
    'video_url' => 'https://youtube.com/1',
    'thumbnail_url' => 'https://youtube.com/2'
])->getRecords());