<?php
require '../loadTemplate.php';
require '../functions.php';
require '../dbconnection.php';
session_start();


	if (isset($_POST['submit'])) {

		$criteria = [
			'name' => $_POST['name'],
			'categoryId' => $_POST['categoryId']
		];

		save($pdo, 'category', $criteria, 'categoryId')
		echo 'Category Saved';
	}
	else {
		if (isset($_GET['categoryId'])) {
			$category = find($pdo, 'category', 'categoryId', $_GET['categoryId']);
		}
		else {
			$category = false;
		}
		$output = loadTemplate('../../templates/editcategory.html.php', ['category' => $category[0]]);
		$title = 'Edit category';
	}
	require '../templates/layout.html.php';
	


