
<h2><?= $dish->name; ?></h2>

<?php
foreach ($reviews as $review) { 
    ?>
<blockquote>
    <p>
        <?=$review->reviewText?>
        <em>Posted by: <?= $review->getUser()->username ?></em>
        <a href="/review/edit?idreview=<?=$review->idreview?>">edit</a>
        <form action="/review/delete" method="POST">
            <input type="hidden" name="review[idreview]" value="<?=$review->idreview?>" />
            <input type="submit" value="Delete" />
        </form>
    </p>
</blockquote>
<?php } ?>

<form action="/review/edit" method="POST">
<input type="hidden" name="review[userId]" value="<?=$user->iduser?>" />
    <input type="hidden" name="review[dishId]" value="<?=$dish->id?>" />
    <label>Review</label>
    <textarea name="review[reviewText]" placeholder="Type your review here"> </textarea>
    <label>Rating 1-5</label>
    <input type="text" name="review[rating]" />
    <input type="submit" value="Add" />
</form>
