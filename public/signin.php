<?php
// register new users
session_start();
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Register';
//if the submit button was clicked
if (isset($_POST['submit'])) {
    $passStmt= $pdo->prepare('SELECT * FROM user WHERE username = :username');
	$values = [
	 'username' => $_POST['username'],
	 
	];
	//encrypt the password
	//$hash = password_hash($password, PASSWORD_DEFAULT);
	$passStmt->execute($values);
	$user = $passStmt->fetch();
	//check if user with that username and password is already registered
	if (password_verify($_POST['password'], $user['password'])) {
        //if they are notify them 
	echo '<p>You are already registered as<strong>' . '	' . $_POST['username'] . '</strong></p>';
    }
	//else if all of the above rules have been met, add the new user to the record
	else {
        $criteria = [
			'username' => $_POST['username'],
			'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT)
		];

		save($pdo, 'user', $criteria, 'iduser');
		echo 'User saved';
        echo '<p><a href="login.php">Please log in</a></p>';
    }
}
    else {
        $output = loadTemplate('../templates/signin.html.php', []);
        $title = 'Sign in';
    }
    require '../templates/layout.html.php';
    ?>