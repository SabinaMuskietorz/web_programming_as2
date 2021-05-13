<a class="new" href="adddish.php">Add new dish</a>

			<table>
			<thead>
			<tr>
			<th>Title</th>
			<th style="width: 15%">Price</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 15%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>
			</thead>
			</table>



<?php
foreach ($dishes as $dish) {
    ?>
    <tr>
        <td><?= $dish->name?></td>
        <td><?=$dish->price?></td>
        <td><a style="float: right" href="/editdish&?id=<?=$dish->id?>">Edit</a></td>
        <td>
            <form method="post" action="/deletedish">
                <input type="hidden" name="id" value="<?=$dish->id?>" />
                <input type="submit" name="submit" value="Delete" />
            </form>
        </td>
    </tr>
    <?php
    }
    ?>


    