<form action="" method="POST">

    <input type="hidden" name="id" value="<?= $templateVars['id'] ?? ''?>"/>
    <label>Name</label>
    <input type="text" name="name" value="<?= $templateVars['name'] ?? ''?>"/>


    <input type="submit" name="submit" value="Save Category" />

</form>
