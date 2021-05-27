<form action="" method="POST">

    <input type="hidden" name="dish[id]" value="<?=$dish->id ?? ''?>"/>
    <label>Select category:</label>
    <select name="dish[categoryId]">
    <?php
    //loop through categories
       foreach ($categories as $category) { 
         //if category has been approved by admin
      if ($category->visibility == 'shown') { ?>
         <option  
          <?php 
              if(isset($dish) && $category->id == $dish->categoryId) {
                'selected'; 
              }
            ?>
            value="<?=$category->id?>"><?=$category->name?></option>
   <?php  }} ?> 
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