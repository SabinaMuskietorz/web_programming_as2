<?php
require '../loadTemplate.php';
require '../functions.php';
require '../dbconnection.php';
session_start();



	if (isset($_POST['submit'])) {

		$record = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'visibility' => $_POST['visibility']
			'id' => $_POST['id']
		];
		save($pdo, 'dish', $record, 'id');
		echo 'Dish saved';
	}
	else {
		if (isset($_GET['id'])) {
			$dish = find($pdo, 'dish', 'id', $_GET['id']);
		}
		else {
			$dish = false;
		}
		$output = loadTemplate('../../templates/editdish.html.php', ['dish' => $dish[0]]);
		$title = 'Edit dish';
	}
	require '../templates/layout.html.php';
	?>
	

