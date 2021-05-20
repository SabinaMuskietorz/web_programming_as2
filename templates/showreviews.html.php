<section class="right">
<h2><?= $dish->name; ?></h2>

<?php
foreach ($reviews as $review) { 
    ?>
<ul>
    <li>
        <?=$review->reviewText?>
        <em>Posted by:  <?=$review->name?></em>
        <a href="/review/edit?id=<?=$review->id?>">edit</a>
        
        
    </li>
</ul>

<?php } ?>
<!--<form action="/review/edit" method="POST">
    <label>Name</label>
    <input type="text" name="review[name]" value="" />
    <input type="hidden" name="review[dishId]" value="" />
    <label>Review</label>
    <textarea name="review[reviewText]" placeholder="Type your review here"> </textarea>
    <label>Rating 1-5</label>
    <input type="text" name="review[rating]" value="" />
    <input type="submit" value="Add" />
</form>-->

<form action="" method="POST">
    <input type="hidden" name="review[id]" value="" />
    <input type="hidden" name="review[dishId]" value="" />
    <label>Name</label>
    <input type="text" name="review[name]" value="" />
    <label>Review</label>
    <textarea name="review[reviewText]"></textarea>
    <label>Rating 1-5</label>
    <input type="text" name="review[rating]" value="" />
    <?php
    if(isset($_SESSION ['admin'])) {
        ?>
    <label>Visibility:</label>
    <input type="text" name="review[visibility]" value="" />
    <?php
    }
    ?>
    <input type="submit" value="Save" />
</form>



