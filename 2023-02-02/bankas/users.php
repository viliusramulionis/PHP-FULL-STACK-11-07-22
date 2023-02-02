<?php
/*
C - Create
R - Read
U - Update
D - Delete

Veiksmų seka naujų duomenų pridėjimui
1. Atidarome failą ir paimame duomenis
2. Iššifruojame stringą pasinaudojant json_decode() funkcija
3. Pridedame į masyvą naują elementą
4. Užšifruojame duomenis atgal į JSON formatą
5. Išsaugome stringą faile
*/

//Paimame duomenis iš json failo
$database = file_get_contents('database.json');

//json_decode() funkcija iskonvertuoja JSON formatą į apdorojamus duomenis (masyvą, stringą, skaičių ir t.t.)
$decoded = json_decode($database);

$user = [
    'id' => '1234',
    'name' => 'Adomas',
    'last_name' => 'Jonaitis',
    'iban' => 'LT456165165165165',
    'password' => '1234'
];

$decoded[] = $user;

$users = json_encode($decoded);

file_put_contents('database.json', $users);

//Norint pasiekti reikšmę iš std Objekto naudojama selektoriaus sintaksė "->"
//print_r($users[0]->id);
?>