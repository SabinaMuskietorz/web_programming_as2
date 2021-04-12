<form action="" method="POST">

    <input type="hidden" name="id" value="<?php echo $currentCategory['id']; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $currentCategory['name']; ?>" />


    <input type="submit" name="submit" value="Save Category" />

</form>