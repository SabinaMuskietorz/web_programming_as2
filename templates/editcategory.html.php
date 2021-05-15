<form action="/category/edit" method="POST">

    <input type="hidden" name="id" value="<?= $templateVars->id ?? ''?>"/>
    <label>Name</label>
    <input type="text" name="name" value="<?= $templateVars->name ?? ''?>"/>
    <input type="text" name="visibility" value="<?= $templateVars->visibility ?? ''?>"/>


    <input type="submit" name="submit" value="Save Category" />

</form>
