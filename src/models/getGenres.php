<?php

namespace serverBros\hw3\models;

use Genres;
use mysqli;
use serverBros\hw3\config\config;

require_once('src/configs/config.php');

//this is the controller class that can be called everytime 
//you need to fetch the current list of genres in the db
//list of genre names will be stored in the array
class GetCurrentsGenres
{
    public $servername;
    public $username;
    public $password;
    public $getGenreQuery;
    public $dbName;
    public $listofGenres = [];

    function fetchGenres()
    {
        $config = new config();
        $connection = $config->GetConnection();
        $getGenreQuery = "SELECT name,genreid FROM Genres ORDER BY name ASC";

        if ($connection->connect_error) {
            die("connection failed: " . $connection->connect_error);
        }

        $result = mysqli_query($connection, $getGenreQuery);

        //add elements of result set to array
        while ($row = mysqli_fetch_row($result)) {
            $Genre = new Genre('');
            $Genre->genreId = $row[1];
            $Genre->genreName = $row[0];
            $Genre->isReview = $this->FetchReview($row[1]);
            array_push($this->listofGenres, $Genre);
        }
        $result->free_result();

        $connection->close();

        return $this->listofGenres;
    }
    public function FetchReview($genreId)
    {
        $config = new config();
        $connection = $config->GetConnection();
        $getGenreQuery = "SELECT count(reviewId) FROM Reviews where genreId=" . $genreId;

        if ($connection->connect_error) {
            die("connection failed: " . $connection->connect_error);
        }

        $result = mysqli_query($connection, $getGenreQuery);
        $Review = false;
        //add elements of result set to array
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] > 0) {
                $Review = true;
            }
        }

        $result->free_result();

        $connection->close();
        return $Review;
    }
}
