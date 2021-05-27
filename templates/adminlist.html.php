<?php
//admin navigation
require 'adminnav.html.php';
?>
    <section class="right">
    <!--link to add new dish-->
<a class="new" href="/dish/edit">Add new dish</a>
<!--put everything in table-->
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th style="width: 15%">Price</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 5%">&nbsp;</th>
            
        </tr>
<?php
//display all dishes
foreach ($dishes as $dish) { 
    ?>
<tr>
    <td><?= $dish->name?></td>
    <td><?=$dish->price?></td>
    <?php
    //if dish is not published
    if ($dish->visibility == 'hidden') { 
        //button to make it published
        ?>
    <td>
                        <form action="/dish/appear" method="POST">
                        <input type="hidden" name="id" value="<?=$dish->id?>" />
                        <input type="submit" value="Appear" />
                    </form>
</td>
<?php } 
//if dish is published
if ($dish->visibility == 'shown') { 
    //button to hide it from user's sight, but not delete it
    ?>
<td>
                        <form action="/dish/hide" method="POST">
                        <input type="hidden" name="id" value="<?=$dish->id?>" />
                        <input type="submit" value="Hide" />
                    </form>
</td> 
<?php } 
//link to edit the dish
?>

    <td><a style="float: right" href="/dish/edit?id=<?=$dish->id?>">Edit</a></td>
    <td>
    <!--button to delete the dish permanently-->
    <form action="/dish/delete" method="POST">
    <input type="hidden" name="id" value="<?=$dish->id?>"/>
		<input type="submit" value="Delete" />
	</form>
    </td>
</tr>
<?php
    }
    ?>
    </thead>
</table>
    </section>