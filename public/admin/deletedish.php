<?php
require '../../dbconnection.php';
require '../functions.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	deleteDish($pdo, $_POST['id']);

	header('location: menu.php');
}


