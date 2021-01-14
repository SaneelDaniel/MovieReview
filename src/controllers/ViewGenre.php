<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\Genre;
use serverBros\hw3\models\GetCurrentsGenres;
use serverBros\hw3\models\movieReview;

require_once('src/models/genreModel.php');
require_once('src/models/getGenres.php');
require_once('src/models/movieReview.php');
class ViewGenre
{
    public function ViewGenreDB()
    {
        $ViewGenre = new GetCurrentsGenres();
        $GenreList = $ViewGenre->fetchGenres();

        $ViewReviews = new movieReview('', '', '', '');
        $ReviewsList = $ViewReviews->fetchReviews('');

        $View = 'src/views/ViewGenres.php';
        include('src/views/layouts/Layout.php');
    }
    public function ViewGenreId($genreId)
    {
        $ViewGenre = new GetCurrentsGenres();
        $GenreList = $ViewGenre->fetchGenres();
        $Genre = new Genre('');
        $Genre->get_genreNameById($genreId);
        $GenreDtl =  $Genre->genreName;
        $GenreId = $Genre->genreId;
        $ViewReviews = new movieReview('', '', '', '');
        $ReviewsList = $ViewReviews->fetchReviews($genreId);
        // include 'src/views/ViewGenresById.php';

        $View = 'src/views/ViewGenresById.php';
        include('src/views/layouts/Layout.php');
    }
}
