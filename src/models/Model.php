<?php

namespace serverBros\hw3\models;
require_once('src/configs/config.php');

class Model {
    public $connection;
    public $servername;
    public $password;
    public $dbName;


    function __construct(){
        $dbConfig = new config();
        $this->servername = $dbconfig::SERVERNAME;
        $this->username = $dbconfig::USERNAME;
        $this->password = $dbconfig:: PASSWORD;
        $this->dbName=$dbconfig::DBNAME; 

        //establish initial connection
        $connection = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
        if($connection-> connect_error) {
            die("connection failed: " . $connection->connect_error);
        }
    }
    
}