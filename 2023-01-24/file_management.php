<?php
    //Tikriname ar direktorija neegzistuoja
    if(!is_dir('failai')) {
        //Sukuriame direktoriją
        mkdir('failai');
    }

    //Tikriname ar nurodytas failas yra direktorija
    //ta pati galima padaryti su file_exists() funkcija
    if(is_file('failai/tekstas.txt')) {
        //Istriname faila
        unlink('failai/tekstas.txt');
    } else {
        //Sukuriame faila
        file_put_contents('failai/tekstas.txt', 'Sveiki');
    }

    if(!is_dir('html')) {
        //Sukuriame direktoriją
        mkdir('html');
    }

    //Duomenų paėmimas
    $html = file_get_contents('https://www.delfi.lt/');

    file_put_contents('html/delfi.html', $html);
?>