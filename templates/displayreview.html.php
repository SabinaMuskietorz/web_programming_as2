<?php
foreach ($reviewQuery as $review) { ?>
<blockquote>
<p>
<?=$review->reviewText?>
<em>Posted by: <?= $review->getUser()->username ?></em>
 <a href="/review/edit?id=<?=$review->id?>">edit</a>
 <form action="/review/delete" method="POST">
 <input type="hidden" name="id" value="<?=$review->id?>" />
 <input type="submit" value="Delete" />
 </form>
</p>
</blockquote>
<?php } ?>