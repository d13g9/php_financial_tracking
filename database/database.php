<?php

class Database {
    private $conn;
    private string $database_url;
    private string $user;
    private string $table;
    private static $instance;

    private function __construct(){
        $this->user = "root";
        $this->table = "ledger";
        $this->database_url = "localhost";
        //echo "passei";
        $this->conn = new mysqli($this->database_url, $this->user, "",  $this->table);

    }

    public function runQuery(string $query){
        return $this->conn->query($query);
    }

    public static function getInstance(){
        if(!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function close(){
        $this->conn->close();
    }

}





?>