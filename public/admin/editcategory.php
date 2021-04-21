<?php
session_start();
require '../../loadTemplate.php';
require '../../DatabaseTable.php';
require '../../dbconnection.php';

$categoriesTable = new DatabaseTable($pdo, 'category', 'id');


	if (isset($_POST['submit'])) {
 
		$templateVars = [
			'name' => $_POST['name'],
			'id' => $_POST['id']
		];

		$categoriesTable->save($templateVars);
		$output = 'Category saved';
	}
	else {
		if (isset($_GET['id'])) {
			$result = $categoriesTable->find('id', $_GET['id']);
			$templateVars = $result[0];
		}
		else {
			$templateVars = false;
		}
		$output = loadTemplate('../../templates/editcategory.html.php', ['category' => $category[0]]);
		$title = 'Edit category';
	}
	require '../../templates/layout.html.php';
	


