<!DOCTYPE html>
<div style='border:1px solid black;width:4in;height:4in;margin:.05in;padding:0.25in;'>
    <h1 style='font-size:20pt;'>
        <a href='index.php'>Movie Reviews</a>
        <?php if (isset($GenreDtl)) {
            echo "/";
        } ?>
        <a href='index.php?c=ViewGenre&m=ViewGenreId&arg1=<?php if (isset($GenreId)) {
                                                                echo $GenreId;
                                                            } ?>'>
            <?php if (isset($GenreDtl)) {
                echo $GenreDtl;
            } ?>
        </a></h1>
    <div>
        <?php include($View) ?>
    </div>
</div>

</html>