<form action="/review?id=<?php echo $_GET->id;?>" method="post">
	 <label>Review</label>
	 <textarea name="reviewText"></textarea>
	 <input type='hidden' name='userId' value="<?php  $_GET->userId;?>" />
	 <input type='hidden' name='dishId' value="<?php  $_GET->dishId;?>" />
	 <label>Rating 1-5</label>
	 <input type="rating" name="rating" />


	 <input type="submit" name="postreview" value="Post review" />
 </form>