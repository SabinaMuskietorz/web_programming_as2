<?php
require '../dbconnection.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	delete($pdo, 'category', 'categoryId', $_POST['categoryId']);


	header('location: categories.php');
}


