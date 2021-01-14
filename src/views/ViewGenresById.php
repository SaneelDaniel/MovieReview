    <div style="float:left;position:relative;height:1.5in;top:-.17in;width:1.5in;">
        <h2 style="margin-bottom:1px;padding-bottom:1px;">Genres</h2>
        <ul style="margin:1px;padding:1px;">
            <li>
                <b>[<a href="index.php">Home</a>]</b>
            </li>
            <?php
            for ($x = 0; $x < count($GenreList); $x++) {
                echo "<li><b><a href='index.php?c=ViewGenre&m=ViewGenreId&arg1=" . $GenreList[$x]->genreId . "'>" . $GenreList[$x]->genreName . "</a></b></li>";
            }
            ?>
        </ul>
    </div>
    <div style="height:1in;">
        <h2 style="margin-bottom:1px;padding-bottom:1px;">Reviews</h2>
        <ul style="margin:1px;padding:1px;">
            <li>
                <b>[<a href="index.php?c=AddReview&m=AddReviewDB&arg1=<?php echo $GenreId ?>">Add Review</a>]</b>
            </li>
            <?php
            for ($x = 0; $x < count($ReviewsList); $x++) {
                echo "<li><b><a href='index.php?c=ViewReview&m=ViewReviewDB&arg1=" 
                        . $ReviewsList[$x]->reviewId . "'>" 
                        . $ReviewsList[$x]->reviewTitle . "</a>
                        <a href='index.php?c=DeleteReview&m=DeleteReviewDB&arg1=" 
                        . $ReviewsList[$x]->reviewId . "'>[-]</a> "
                        . $ReviewsList[$x]->reviewDate ."</b></li>";
            }
            ?>
        </ul>
    </div>