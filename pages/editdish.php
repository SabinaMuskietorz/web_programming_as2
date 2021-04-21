<?php
session_start();
require '../functions/loadTemplate.php';
require '../classes/DatabaseTable.php';
require '../../dbconnection.php';

$dishesTable = new DatabaseTable($pdo, 'dish', 'id');




	if (isset($_POST['submit'])) {

		$record = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'visibility' => $_POST['visibility'],
			'id' => $_GET['id']
		];
		$dishesTable->save($record);
		$output = 'Dish saved';
	}
	else {
		if (isset($_GET['id'])) {
			$dish = $dishesTable->find('id', $_GET['id']);
		}
		else {
			$dish = false;
		}
		$output = loadTemplate('../../templates/editdish.html.php', ['dish' => $dish[0]]);
		$title = 'Edit dish';
	}
	require '../../templates/layout.html.php';
	?>
	

