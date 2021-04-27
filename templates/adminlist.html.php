<?php
foreach ($dishes as $dish) {
    ?>
    <tr>
        <td><?= $dish['name']?></td>
        <td><?=$dish['price']?></td>
        <td><a style="float: right" href="/editdish&?id=<?=$dish['id']?>">Edit</a></td>
        <td>
            <form method="post" action="/deletedish">
                <input type="hidden" name="id" value="<?=$dish['id']?>" />
                <input type="submit" name="submit" value="Delete" />
            </form>
        </td>
    </tr>
    <?php
    }
    ?>


    /* zmien arrays to objects $joke[‘joketext’] becomes $joke->jokeText */