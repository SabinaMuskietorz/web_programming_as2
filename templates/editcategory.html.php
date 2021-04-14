<form action="" method="POST">

    <input type="hidden" name="id" value="<?= $criteria['categoryId'] ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<?= $criteria['name']; ?>" />


    <input type="submit" name="submit" value="Save Category" />

</form>
