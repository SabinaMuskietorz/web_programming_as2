<?php
require '../../dbconnection.php';
require '../../functions.php';
session_start();

	delete($pdo, 'category', 'categoryId', $_POST['categoryId']);


	header('location: categories.php');


