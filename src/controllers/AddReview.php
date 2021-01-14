<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\Genre;

include('src/models/genreModel.php');
class AddReview
{
    public function AddReviewDB($params)
    {
        $genre = new Genre('');
        $genre->get_genreNameById($params);
        $GenreDtl = "/" . $genre->genreName;
        $GenreId = $genre->genreId;
        $View = 'src/views/AddReviews.php';
        include('src/views/layouts/Layout.php');
    }
}
