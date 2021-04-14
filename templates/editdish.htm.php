<form action="" method="post">

    <input type="hidden" name="dish[id]" value="<?= $record['id'] ?? ''?>" />
    <label for="name">Name:</label>
    <textarea id="name" name="dish[name]"> <?= $record['name'] ?? ''?> </textarea>
    <label for="description">Type description here:</label>
    <textarea id="description" name="dish[description]" rows="3" cols="40"> <?= $$record['description'] ?? ''?> </textarea>
    <label for="price">Price:</label>
    <textarea id="price" name="dish[price]"> <?= $record['price'] ?? ''?> </textarea>
    <label for="visibility">Visibility:</label>
    <textarea id="visibility" name="dish[visibility]"> <?= $record['visibility'] ?? ''?> </textarea>
    <input type="submit" name="submit" value="Add" />
</form>