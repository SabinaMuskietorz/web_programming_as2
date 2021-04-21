<?php
session_start();
require '../../dbconnection.php';
require '../../DatabaseTable.php';

$categoriesTable = new DatabaseTable($pdo, 'category', 'id');


	$categoriesTable->delete('id', $_POST['id']);


	header('location: categories.php');


