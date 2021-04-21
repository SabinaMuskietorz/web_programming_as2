<?php
require '../../dbconnection.php';
session_start();


$dishesTable->delete($_POST['id']);

	header('location: index.php?page=admin');




