<?php
foreach ($reviewQuery as $review) { ?>
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