<?php

// function pavadinimas($pirmas, $antras = 50) {
//     return $pirmas * $antras;
// }

// $x = pavadinimas(10);

// echo $x;

function select($table, $fields = '*', $where = []) {
    //$sql = "SELECT id, role FROM users WHERE email = '{$email}' AND password = '{$password}'";   
    //Norint pasiekti globalų kintamajį funkcijoje
    global $db;

    $query = '';

    foreach($where as $key => $value) {
        if(!empty($query))
            $query .= " AND ";

        $query .= "$key = '$value' ";
    } 

    if(count($where) > 0)
        $query = 'WHERE ' . $query; 


    $sql = "SELECT $fields FROM $table $query"; 
    $result = $db->query($sql);

    return $result->fetch_all();
}