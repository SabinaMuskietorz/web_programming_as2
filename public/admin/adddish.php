<?php
require '../../dbconnection.php';
session_start();
require '../functions.php';
require '../../loadTemplate.php';
$title = 'Add new dish';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		if (isset($_POST['submit'])) {
		$record = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'visibility'=> $_POST['visibility']
		];
		insert($pdo, 'dish', $record);

		echo 'Dish Added';
	}
	else {
		
		$output = loadTemplate('../../templates/adddish.html.php', []);
		
		
		}
	}

else {
	require '../../templates/login.html.php';
}
require '../../templates/layout.html.php';


