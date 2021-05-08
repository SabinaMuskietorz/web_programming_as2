<h2><?= $dish->name; ?></h2>

<?php
foreach ($reviews as $review) { 
    ?>
<ul>
    <li>
        <?=$review->reviewText?>
        <em>Posted by:  <?=$review->name?></em>
        <a href="/review/edit?idreview=<?=$review->idreview?>">edit</a>
        
    </li>
</ul>

<?php } ?>

<form action="/review/edit" method="POST">
    <label>Name</label>
    <input type="text" name="review[name]" value="" />
    <input type="hidden" name="review[dishId]" value="<?=$dish->id?>" />
    <label>Review</label>
    <textarea name="review[reviewText]" placeholder="Type your review here"> </textarea>
    <label>Rating 1-5</label>
    <input type="text" name="review[rating]" value="" />
    <input type="submit" value="Add" />
</form>

