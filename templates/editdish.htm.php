<form action="" method="post">

    <input type="hidden" name="dish[id]" value="<?= $dish->id ?? ''?>" />
    <label for="name">Name:</label>
    <textarea id="name" name="dish[name]"> <?= $dish->name ?? ''?> </textarea>
    <label for="description">Type description here:</label>
    <textarea id="description" name="dish[description]" rows="3" cols="40"> <?= $dish->description ?? ''?> </textarea>
    <label for="price">Price:</label>
    <textarea id="price" name="dish[price]"> <?= dish->price ?? ''?> </textarea>
    <label for="visibility">Visibility:</label>
    <select name="visibility">
        <option value="hidden">Hidden</option>
        <option value="shown">Shown</option>
    </select>
    <input type="submit" name="submit" value="Add" />
</form>