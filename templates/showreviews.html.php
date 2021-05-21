<section class="right">
    <h2><?=$dish->name?></h2>
    <?php
    foreach ($reviews as $review) { 
        if($review->visibility == 'shown') {
        ?>
    <ul>
        <li>
            <?=$review->reviewText?>
            <em>Posted by: <?=$review->name?></em>
        </li>
    </ul>
    <?php }} ?>
    <form action="/review/edit" method="POST">
        <?php if(isset($review)) { ?>
        <input type="hidden" name="review[id]" value="" />
        <?php } ?>
        <input type="hidden" name="review[dishId]" value="<?=$dish->id ?? ''?>" />
        <label>Name</label>
        <input type="text" name="review[name]" value="" />
        <label>Review</label>
        <textarea name="review[reviewText]"></textarea>
        <label>Rating 1-5</label>
        <select name="review[rating]">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Save" />
    </form>