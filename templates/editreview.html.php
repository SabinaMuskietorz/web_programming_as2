<form action="" method="post">

    <input type="hidden" name="review[idreview]" value="<?= $record['idreview'] ?? ''?>"/>
    <label for="visibility">Visibility:</label>
    <input id="visibility" name="review[visibility]"> <?= $record['visibility'] ?? ''?> 
    <input type="submit" name="submit" value="Save" />
</form>