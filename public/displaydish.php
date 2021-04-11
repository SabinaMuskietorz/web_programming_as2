<?php
$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student');
$title = 'Display menu';
if (isset($_GET['id']))  {
	$categoryStmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
    $values = [
		'id' => $_GET['id']
		 ];       
		 $categoryStmt->execute($values); 
		 $category = $categoryStmt->fetch();
		 
$stmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = :categoryId');
$values = [
    'categoryId' => $_GET['categoryId']
     ];       

$stmt->execute();
else {
    header('location: /index.php'); 
}
}

ob_start();
require '../templates/list.html.php';
$output = ob_get_clean();
require '../templates/layout.html.php';



