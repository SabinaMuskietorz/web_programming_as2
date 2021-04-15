<form action="menu.php?id=<?php echo $_GET['id'];?>" method="post">
	 <label>Review</label>
	 <textarea name="review"></textarea>
	 <input type='hidden' name='userId' value="userId " />
	 <input type='hidden' name='dishId' value="<?php  $_GET['dishId'];?>" />

	 <input type="submit" name="postreview" value="Post review" />
 </form>