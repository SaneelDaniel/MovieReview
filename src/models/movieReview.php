<?php


namespace serverBros\hw3\models;

use serverBros\hw3\config\config;

require_once('src/configs/config.php');
require_once('src/models/Model.php');
require_once('src/models/genreModel.php');

class movieReview extends Model
{
    public $reviewTitle;
    public $reviewText;
    public $genreId;
    public $reviewId;
    public $reviewDate;
    public $genreName;
    public $config;
    public $connection;
    public $listofReviews = [];
    public function __construct($reviewTitle, $reviewText, $genreId,$reviewId)
    {
        $this->config = new config();
        $this->connection = $this->config->GetConnection();
        $this->reviewTitle = $reviewTitle;
        $this->reviewText = $reviewText;
        $this->genreId = $genreId;
        $this->reviewId = $reviewId;
    }

    public function get_reviewTitle()
    {
        return $this->reviewTitle;
    }

    public function get_reviewText()
    {
        return $this->reviewText;
    }

    public function get_genreReviewId()
    {
        return $this->genreId;
    }
    public function get_ReviewId()
    {
        return $this->reviewId;
    }
    public function insertMovieReview()
    {
        $insertReviewQuery = $this->connection->prepare("INSERT INTO Reviews(genreId, title, content, insertDate) VALUES(?,?,?,curdate())");
        $insertReviewQuery->bind_param("sss", $genreId, $reviewTitle, $reviewText);

        $genreId = $this->get_genreReviewId();
        $reviewTitle = $this->get_reviewTitle();
        $reviewText = $this->get_reviewText();
        $insertReviewQuery->execute();
    }

    public function deleteReview()
    {
        $config = new config();
        $connection = $config->GetConnection();
        $deleteGenreQuery = $connection->prepare("DELETE FROM Reviews WHERE reviewId=(?)");
        $deleteGenreQuery->bind_param("s", $reviewId);
        $reviewId = $this->get_ReviewId();
        $deleteGenreQuery->execute();
    }
    function fetchReviews($genreId)
    {
        $config = new config();
        $connection = $config->GetConnection();
        $getReviewQuery = "SELECT reviewId,title,genreid,content,insertDate FROM reviews ORDER BY insertDate DESC";
        if ($genreId) {
            $getReviewQuery = "SELECT reviewId,title,genreid,content,insertDate FROM reviews where genreId=" . $genreId . " ORDER BY insertDate DESC";
        }
        
        if ($connection->connect_error) {
            die("connection failed: " . $connection->connect_error);
        }

        $result = mysqli_query($connection, $getReviewQuery);
        //add elements of result set to array
        while ($row = mysqli_fetch_row($result)) {
            $review = new movieReview($row[1], $row[3], $row[2],$row[0]);
            $review->reviewDate = $row[4];
            array_push($this->listofReviews, $review);
        }
        $result->free_result();

        $connection->close();

        return $this->listofReviews;
    }
    function fetchReviewbyId($ReviewId)
    {
        $config = new config();
        $connection = $config->GetConnection();
        $getReviewQuery = "SELECT reviewId,title,genreid,content,insertDate FROM reviews where reviewId=" . $ReviewId . " ORDER BY insertDate DESC";
        if ($connection->connect_error) {
            die("connection failed: " . $connection->connect_error);
        }

        $result = mysqli_query($connection, $getReviewQuery);
        //add elements of result set to array
        while ($row = mysqli_fetch_row($result)) {
            $this->reviewTitle = $row[1];
            $this->genreId = $row[2];
            $this->reviewText = $row[3];
            $this->reviewDate = $row[4];
        }
        
        $result->free_result();

        $connection->close();
        $Genre = new Genre('');
        $Genre->get_genreNameById($this->genreId);
        $GenreDtl = $Genre->genreName;
        return $this;
    }
}
