<form action="" method="POST">
	<input type="hidden" name="user[id]" value="" />
	<label>Username</label>
	<input type="text" name="user[username]" value="" />
	<input type="hidden" name="user[role]" value="<?=$user->role ?? ''?>" />
	<label>Password</label>
	<input type="password" name="user[password]" value="" />
	<input type="submit" name="submit" value="Save" />
</form>