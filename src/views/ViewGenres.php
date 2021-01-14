    <div style="float:left;position:relative;height:1.5in;top:-.17in;width:1.5in;">
        <h2 style="margin-bottom:1px;padding-bottom:1px;">Genres</h2>
        <ul style="margin:1px;padding:1px;">
            <li>
                <b>[<a href="index.php?c=NewGenre&m=NewGenreCall">New Genre</a>]</b>
            </li>
            <?php
            for ($x = 0; $x < count($GenreList); $x++) {
                echo "<li><b><a href='index.php?c=ViewGenre&m=ViewGenreId&arg1="
                    . $GenreList[$x]->genreId . "'>"
                    . $GenreList[$x]->genreName . "</a>";
                if (!$GenreList[$x]->isReview)
                    echo "
                    <a href='index.php?c=DeleteGenre&m=DeleteGenreId&arg1="
                        . $GenreList[$x]->genreId . "'>[-]</a></b></li>";
            }
            ?>
        </ul>
    </div>
    <div style="height:1in;">
        <h2 style="margin-bottom:1px;padding-bottom:1px;">Reviews</h2>
        <ul style="margin:1px;padding:1px;">
            <?php
            for ($x = 0; $x < count($ReviewsList); $x++) {
                echo "<li><b><a href='index.php?c=ViewReview&m=ViewReviewDB&arg1=" . $ReviewsList[$x]->reviewId . "'>" . $ReviewsList[$x]->reviewTitle  . "</a> " . $ReviewsList[$x]->reviewDate . "</b></li>";
            }
            ?>
        </ul>
    </div>