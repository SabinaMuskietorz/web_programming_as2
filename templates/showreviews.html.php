<section class="right">
<h2><?= $dish->name; ?></h2>
<a class="new" href="/review/edit">Add new review</a>

<?php
foreach ($reviews as $review) { 
    ?>
<ul>
    <li>
        <?=$review->reviewText?>
        <em>Posted by:  <?=$review->name?></em>
        
        
        
    </li>
</ul>

<?php } ?>


