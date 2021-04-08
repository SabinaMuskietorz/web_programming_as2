<?php
$title = 'Delete dish';
$content = '

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM menu WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: menu.php');
}';
require layout.php;
?>


