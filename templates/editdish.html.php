<form action="/dish/edit" method="post">

    <input type="hidden" name="dish[id]" value="<?= $record->id ?? ''?>"/>
    <label for="name">Name:</label>
    <input id="name" name="dish[name]"> <?= $record->name ?? ''?> 
    <label for="description">Type description here:</label>
    <textarea id="description" name="dish[description]" rows="3" cols="40"> <?= $record->description ?? ''?> </textarea>
    <label for="price">Price:</label>
    <input id="price" name="dish[price]"> <?= $record->price ?? ''?> 
    <label for="visibility">Visibility:</label>
    <input id="visibility" name="dish[visibility]"> <?= $record->visibility ?? ''?> 
    <input type="submit" name="submit" value="Save" />
</form>