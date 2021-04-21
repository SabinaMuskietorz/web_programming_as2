<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
require '../classes/Databasetable.php';

$usersTable = new DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new DatabaseTable($pdo, 'review', 'idreview');


require '../pages/' . $_GET['page'] . '.php';
require '../templates/layout.html.php';
?>
