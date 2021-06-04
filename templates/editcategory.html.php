<form action="" method="POST">
<input type="hidden" name="category[id]" value="<?=$category->id ?? ''?>" />
<label>Name</label>
<input type="text" name="category[name]" value="<?=$category->name ?? ''?>" />
<label>Visibility</label>
<input type="text" name="category[visibility]" value="<?=$category->visibility ?? ''?>" />
<input type="submit" name="submit" value="Save Category" />
</form>