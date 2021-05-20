<form action="" method="POST">
    <input type="hidden" name="review[id]" value="<?=$review->id ?? ''?>" />
    <input type="hidden" name="review[dishId]" value="<?=$review->dishId ?? ''?>" />
    <label>Name</label>
    <input type="text" name="review[name]" value="<?=$review->name ?? ''?>" />
    <label>Review</label>
    <textarea name="review[reviewText]"><?=$review->reviewText ?? ''?></textarea>
    <label>Rating 1-5</label>
    <input type="text" name="review[rating]" value="<?=$review->rating ?? ''?>" />
    <label>Visibility:</label>
    <input type="text" name="review[visibility]" value="<?=$review->visibility ?? ''?>" />
    <input type="submit" value="Save" />
</form>