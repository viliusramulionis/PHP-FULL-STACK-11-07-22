<?php

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'youtube';

    public static $db = false;

    public function __construct() {
        if(self::$db)
            return;
            
        try {
            self::$db = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
        } catch(Exception $e) {
            echo 'Nepavyko prisijungti prie duomenų bazės';
            exit;
        }
    }
}