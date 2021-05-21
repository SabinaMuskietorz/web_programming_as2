<form action="" method="POST">
	<input type="hidden" name="user[id]" value="<?=$user->id ?? ''?>" />
	<label>Username</label>
	<input type="text" name="user[username]" value="<?=$user->username ?? ''?>" />
	<?php
	if(isset($_SESSION ['admin'])) {
		?>
	<label>Role</label>
	<input type="text" name="user[role]" value="<?=$user->role ?? ''?>" />
	<?php
	}
		if(!isset($_SESSION ['admin']))  {
			?>
	<label>Password</label>
	<input type="password" name="user[password]" value="" />
	<?php
	}
	?>
	<input type="submit" name="submit"  value="Save" />
</form>