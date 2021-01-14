<?php

namespace serverBros\hw3\config;

use mysqli;

class config
{

    const USERNAME = "root";
    const PASSWORD = "root";
    const SERVERNAME = "127.0.0.1:8889";
    const PORT = 8889;
    const DBNAME = "moviereviewdb";

    public function GetConnection()
    {
        $servername = self::SERVERNAME;
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $dbname = self::DBNAME;
        //Create connection to local db 
        $connection = new mysqli($servername, $username, $password, $dbname);
        return $connection;
    }
}
