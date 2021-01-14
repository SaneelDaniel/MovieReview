    <div>
        <form action="index.php" method="Get">
            <h1>
                Add Review
            </h1>
            <label>Title:</label>
            <input type="hidden" id="c" name="c" value="AddReviewDB" />
            <input type="hidden" id="m" name="m" value="AddReviewDB" />
            <input type="hidden" id="arg1" name="arg1" value="<?php echo $GenreId ?>" />
            <input type="text" id="arg2" name="arg2" placeholder="Title" />
    </div>
    <br />
    <label>Review</label>
    <div>
        <textarea id="arg3" name="arg3" rows="4" cols="25" placeholder="Review"></textarea>
    </div>
    <button type="submit" id="btnSubmit">Save</button>
    </form>