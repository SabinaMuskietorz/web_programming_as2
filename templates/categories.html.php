<h2>Categories</h2>

<a class="new" href="addcategory.php">Add new category</a>
 <table>
<thead>
<tr>
<th>Name</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>
<?php
$categories = $pdo->query('SELECT * FROM category');

foreach ($categories as $category) { ?>
    <tr>
    <td><?= $category['name'] ?></td>
    <td><a style="float: right" href="editcategory.php?id=' . $category['id'] . '">Edit</a></td>
    <td><form method="post" action="deletecategory.php">
    <input type="hidden" name="id" value="' . $category['id'] . '" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
    <?php
}
?>
</thead>
</table>


