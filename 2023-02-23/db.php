<?php

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'spotify';

    public static $database;
    public $users;

    public function __construct() {
        try {
            self::$database = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
            echo 'Prisijungimas sėkmingas';
        } catch(Exception $e) {
            echo 'Nepavyko prisijungti prie duomenų bazės';
        }
    }

    public function getUsers() {
        $this->users = self::$database->query('SELECT * FROM users')->fetch_all(MYSQLI_ASSOC);
        
        return $this;
    }

    public function changeUserPerm() {
        foreach($this->users as $key => $user) {
            $this->users[$key]['role'] = 1;
        }

        return $this;
    }
}

$db = new Database();

echo '<pre>';

$db->getUsers()->changeUserPerm();

print_r($db->users);