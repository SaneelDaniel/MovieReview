<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\Genre;
include('src/models/genreModel.php');
class DeleteGenre
{
    public function DeleteGenreId($params)
    {
        $Genre = new Genre('');
        $Genre->get_genreNameById($params);
        $Genre->deleteGenre();
        header('Location: index.php');
    }
}
