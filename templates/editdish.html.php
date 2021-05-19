<form action="" method="POST">

    <input type="hidden" name="dish[id]" value="<?=$dish->id ?? ''?>"/>
    <label>Select category:</label>
	<select name="categoryId">Select category
    <ul>
		<?php  
        
        // loop through categories 
		foreach ($categories as $category) { ?>
        
			<li><a href="/dish/edit?id=<?=$category->id ?? ''?>"><?=$category->name?></a></li>
            </ul>
            <?php
		}
		?>
	</select>
    <label>Name:</label>
    <input type="text" name="dish[name]" value="<?=$dish->name ?? ''?>"/>
    <label>Type description here:</label>
    <textarea name="dish[description]" rows="3" cols="40" ><?=$dish->description ?? ''?></textarea>
    <label>Price:</label>
    <input type="text" name="dish[price]" value="<?=$dish->price ?? ''?>"/>
    <label>Visibility:</label>
    <input type="text" name="dish[visibility]" value="<?=$dish->visibility ?? ''?>"/>
    <input type="submit" name="submit" value="Save Dish" />
</form>