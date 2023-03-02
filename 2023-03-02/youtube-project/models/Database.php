<?php

namespace Models;

abstract class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'youtube';

    public static $db = false;

    public $table = false;

    public function __construct() {
        if(self::$db)
            return;
            
        try {
            self::$db = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
        } catch(\Exception $e) {
            echo 'Nepavyko prisijungti prie duomenų bazės';
            exit;
        }
    }
    public function getDatabase() {
        return self::$db;
    }

    public function getRecords() {
        return self::$db->query("SELECT * FROM $this->table")->fetch_all(MYSQLI_ASSOC);
    }

    public function addRecord($data) {
        $keys = implode(', ', array_keys($data));
        $placeholder = implode(', ', array_fill(0, count($data), "'%s'"));
        //echo "INSERT INTO `videos` ($keys) VALUES ($placeholder)";
        //echo vsprintf("INSERT INTO videos ($keys) VALUES ($placeholder)", $data);
        
        self::$db->query(
            vsprintf("INSERT INTO $this->table ($keys) VALUES ($placeholder)", $data)
        );

        return $this;
    }

    public function updateRecord($id, $data) {
        $values = [];

        foreach($data as $key => $value) {
            $values[] = $key . " = '$value'";
        }

        $query =  implode(', ', $values);

        self::$db->query("UPDATE $this->table SET $query WHERE id = $id");

        return $this;
    }

    public function deleteRecord($id) {
        self::$db->query("DELETE FROM $this->table WHERE id = $id");
    }

    public function getRecordId() {
        return self::$db->insert_id;
    }
}