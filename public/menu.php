<?php
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Display menu';
if (isset($_GET['id']))  {
	$categoryStmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
    $values = [
		'id' => $_GET['id']
		 ];       
		 $categoryStmt->execute($values); 
		 $category = $categoryStmt->fetch();
		 
$dishesstmt = $pdo->prepare('SELECT * FROM dish WHERE categoryId = :categoryId');
$values = [
    'categoryId' => $_GET['categoryId']
     ];       

$dishesstmt->execute();
$dishes = $dishesstmt->fetchAll();
$templateVars = ['dishes' => $dish];
$output = loadTemplate('../templates/list.html.php', $templateVars);

require '../templates/layout.html.php';



else {
    header('location: /index.php'); 
}
}



