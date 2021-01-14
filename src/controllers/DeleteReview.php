<?php

namespace serverBros\hw3\controllers;

use serverBros\hw3\models\movieReview;

include('src/models/movieReview.php');
class DeleteReview
{
    public function DeleteReviewDB($params)
    {
        $review = new movieReview('','','',$params);
        $review->deleteReview($params);
        header('Location: index.php');
    }
}
