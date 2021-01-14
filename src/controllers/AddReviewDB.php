<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\movieReview;

include('src/models/movieReview.php');
class AddReviewDB
{
    public function AddReviewDB($genreId, $title, $review)
    {
        if (trim($title) == "" || trim($review) == "") {
            header("Location: index.php?c=ViewGenre&m=ViewGenreId&arg1=" . $genreId);
            return;
        }
        $Genre =  new movieReview($title, $review, $genreId, '');
        $Genre->insertMovieReview();
        header("Location: index.php?c=ViewGenre&m=ViewGenreId&arg1=" . $genreId);
    }
}
