<?php
require '../../dbconnection.php';
require '../classes/DatabaseTable.php';
session_start();
$disesTable = new DatabaseTable($pdo, 'dish', 'id');

$disesTable->delete('id', $_POST['id']);

	header('location: admin.php');




