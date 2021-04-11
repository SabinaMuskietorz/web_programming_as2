<?php
require '../../dbconnection.php';
session_start();
require '../../loadTemplate.php';
$title = 'Add new dish';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO menu (name, description, price, categoryId, visibility)
							   VALUES (:name, :description, :price, :categoryId, :visibility)');

		$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'visibility'=> $_POST['visibility']
		];

		$stmt->execute($criteria);

		echo 'Dish Added';
	}
	else {
		
		$output = loadTemplate('../templates/adddish.html.php', []);
		
		
		}
	}

else {
	require '../login.htm.php';
}
require '../templates/layout.html.php';


