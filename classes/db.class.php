<?php

class DB {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "";

    public function __construct(string $name){
        $this->dbname = $name;
        // echo "DB object $name created" . "<br>";
    }
    
    public function __destruct(){
        // echo "DB object $this->dbname destroyed" . "<br>";
    }

    public function getName(){
        echo $this->dbname . "<br>";
    }

    protected function connect(){
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected to database: $this->dbname" . "<br>";
            return $pdo;    
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
            return false;
        }
    }
}