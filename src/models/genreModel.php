<?php

namespace serverBros\hw3\models;

use serverBros\hw3\config\config;

require_once('src/configs/config.php');
require_once('src/models/Model.php');
class Genre extends Model
{
    public $genreName;
    public $genreId;
    public $isReview;

    //constructor for the genre object 
    public function __construct($genreName)
    {
        $this->genreName = $genreName;
    }
    public function get_genreNameById($Id)
    {
        $this->genreId = $Id;

        $Config = new config();
        $connection = $Config->GetConnection();
        $getGenreQuery = "select name from Genres where genreId=" . $Id;

        if ($connection->connect_error) {
            die("connection failed: " . $connection->connect_error);
        }

        $result = mysqli_query($connection, $getGenreQuery);
        //add elements of result set to array
        while ($row = mysqli_fetch_row($result)) {
            $this->genreName = $row[0];
        }
    }
    //return the name of this genre object 
    public function get_genreName()
    {
        return $this->genreName;
    }
    public function get_genreId()
    {
        return $this->genreId;
    }
    public function insertGenre()
    {
        //use inherited variables 
        $Config = new config();
        $connection = $Config->GetConnection();
        $insertGenreQuery = $connection->prepare("INSERT INTO Genres(name) VALUES(?)");
        $genreName = $this->get_genreName();
        $insertGenreQuery->bind_param("s", $genreName);

        $insertGenreQuery->execute();
    }

    public function deleteGenre()
    {
        $Config = new config();
        $connection = $Config->GetConnection();
        $deleteGenreQuery = $connection->prepare("DELETE FROM Genres WHERE genreId=(?)");
        $deleteGenreQuery->bind_param("s", $genreId);
        $genreId = $this->get_genreId();
        $deleteGenreQuery->execute();
    }
}
