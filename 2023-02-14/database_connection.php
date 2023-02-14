<?php
//Tikrinimas ar pavyksta prisijungti prie duomenų bazės
try {
    $db = new mysqli('localhost', 'root', '', 'animals');
    //$db = mysqli_connect('localhost', 'root', '', 'animals');
} catch(Exception $klaida) {
    echo 'Nepavyksta prisijungti prie duomenu bazės <br />';
    exit;
}

echo 'Kodas kompiliuojamas toliau...';


//Visų įrašų paėmimas su ciklu
$result = $db->query('SELECT * FROM list');
$result1 = $result;
echo '<pre>';
while($row = $result->fetch_assoc()) {
    echo $row['animal'] . '<br />';
}

//$result = $db->query('SELECT * FROM list');
// while($row = $result1->fetch_assoc()) {
//     echo $row['animal'] . '<br />';
// }

//Vieno įrašo paėmimas
$result = $db->query('SELECT * FROM list WHERE id = 2');

print_r($result->fetch_assoc());

//Visų įrašų paėmimas į masyvą
$result = $db->query('SELECT * FROM list');

//print_r($result->fetch_all());

//Naujo įrašo pridėjimas

$animal = 'Aligator';

$insert = $db->query(sprintf(
    "INSERT INTO list (animal, weight, height, food_supply, accessories) VALUES ('%s', %d, %d, %d, %d)", 
    $animal, 5000, 40, 100, 0
));

if($insert) {
    echo '<h4>Pridėjimas sėkmingas</h4>';

    //Paskutinio pridėto įrašo id
    $id = $db->insert_id;

    if($db->query("UPDATE list SET animal='Snake' WHERE id={$id}")) {
        echo '<h4>Atnaujinimas sėkmingas</h4>';
    }

}

if(isset($_GET['id']) AND $_GET['id'] != '') {
    $id = $_GET['id'];
    $db->query("DELETE FROM list WHERE id = {$id}");
}

//Atsijungimas nuo duomenų bazės
$db->close();
