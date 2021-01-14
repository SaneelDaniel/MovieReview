<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\Genre;
use serverBros\hw3\models\movieReview;

include('src/models/movieReview.php');
class ViewReview
{
    public function ViewReviewDB($ReviewId)
    {
        $ViewReviews = new movieReview('', '', '', '');
        $Review = $ViewReviews->fetchReviewbyId($ReviewId);
        $Genre = new Genre('');
        $Genre->get_genreNameById($Review->genreId);
        $GenreDtl = $Genre->genreName;
        $GenreId = $Genre->genreId;
        $View = 'src/views/ViewReview.php';
        include('src/views/layouts/Layout.php');
    }
}
