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
		 
$dishesstmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = :categoryId');
$values = [
    'categoryId' => $_GET['categoryId']
     ];       

$dishesstmt->execute();

else {
    header('location: /index.php'); 
}
}
require '../loadTemplate.php';
$templateVars = ['menus' => $menus];
$output = loadTemplate('..templates/list.html.php', $templateVars);

require '../templates/layout.html.php';



