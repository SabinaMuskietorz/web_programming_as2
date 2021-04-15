<?php
require '../../loadTemplate.php';
require '../../functions.php';
require '../../dbconnection.php';
session_start();


	if (isset($_POST['submit'])) {
 
		$templateVars = [
			'name' => $_POST['name'],
			'id' => $_POST['id']
		];

		save($pdo, 'category', $templateVars, 'id');
		echo 'Category Saved';
	}
	else {
		if (isset($_GET['id'])) {
			$category = find($pdo, 'category', 'id', $_GET['id']);
		}
		else {
			$category = false;
		}
		$output = loadTemplate('../../templates/editcategory.html.php', ['category' => $category[0]]);
		$title = 'Edit category';
	}
	require '../../templates/layout.html.php';
	


