
    
    
    
    <li>
    <div class="details">
    <h3><?= '£' . $dish->price; ?></h3>
    <h2><?= $dish->name; ?></h2>
    <p><?= nl2br($dish->description); ?></p>
    </div>
    </li>
<?php
foreach ($reviews as $review) { 
    ?>
<blockquote>
<p>
<?=$review->reviewText?>
<em>Posted by: <?= $review->getUser()->username ?></em>
 <a href="/review/edit?idreview=<?=$review->idreview?>">edit</a>
 <form action="/review/delete" method="POST">
 <input type="hidden" name="idreview" value="<?=$review->idreview?>" />
 <input type="submit" value="Delete" />
 </form>
</p>
</blockquote>
<?php } ?>

<form action="/review/edit" method="POST">
<input type="hidden" name="review[dishId]" value="<?=$dish->id?>" />
<textarea name="review[reviewText]" placeholder="Type your review here"> </textarea>

<input type="submit" value="Add" />
</form>