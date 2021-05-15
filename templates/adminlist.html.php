<section class="left">
		<ul>
			<li><a href="/page/admin">Menu</a></li>
			<li><a href="/page/categories">Categories</a></li>

		</ul>
	</section>
    <section class="right">
<a class="new" href="/dish/edit">Add new dish</a>
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
<?php
foreach ($dishes as $dish) { 
    ?>
<tr>
    <td><?= $dish->name?></td>
    <td><?=$dish->price?></td>
    <td><a style="float: right" href="/dish/edit?id=<?=$dish->id?>">Edit</a></td>
    <td>
        <form method="post" action="/dish/delete">
            <input type="hidden" name="id" value="<?=$dish->id?>" />
            <input type="submit" name="submit" value="Delete" />
        </form>
    </td>
</tr>
<?php
    }
    ?>
    </thead>
</table>
    </section>