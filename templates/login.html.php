<h2>Log in</h2>
<?php
foreach ($errors as $error) {
    ?>
    <p><?=$error?></p>
    <?php
}
?>
<form action="" method="post">
<label>Username</label>
<input type="text" name="username" />
    <label>Password</label>
    <input type="password" name="password" />

    <input type="submit" name="submit" value="Log In" />
</form>


