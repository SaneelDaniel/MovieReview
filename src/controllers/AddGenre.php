<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\Genre;
use serverBros\hw3\models\GetCurrentsGenres;

require_once('src/models/genreModel.php');
require_once('src/models/getGenres.php');
class AddGenre
{
    public function AddGenreDB($params)
    {
        if (trim($params) == "") {
            header("Location: index.php?c=ViewGenre&m=ViewGenreDB");
            return;
        }
        $Genre =  new Genre($params);
        $Genre->insertGenre();
        header("Location: index.php?c=ViewGenre&m=ViewGenreDB");
    }
}
