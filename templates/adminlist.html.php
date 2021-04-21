<?php
foreach ($dishes as $dish) {
    ?>
    <tr>
        <td><?= $dish['name']?></td>
        <td><?=$dish['price']?></td>
        <td><a style="float: right" href="index.php?pages=editdish&?id=<?=$dish['id']?>">Edit</a></td>
        <td>
            <form method="post" action="index.php?pages=deletedish">
                <input type="hidden" name="id" value="<?=$dish['id']?>" />
                <input type="submit" name="submit" value="Delete" />
            </form>
        </td>
    </tr>
    <?php
    }
    ?>