<?php
require '../../dbconnection.php';
require '../../functions.php';
session_start();

	delete($pdo, 'dish', 'id', $_POST['id']);

	header('location: menu.php');




