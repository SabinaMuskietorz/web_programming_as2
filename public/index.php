<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
require '../classes/Databasetable.php';

$usersTable = new DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new DatabaseTable($pdo, 'review', 'idreview');

if($_SERVER['REQUEST_URI'] !== '/') {
require '../pages/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.php';
}
else {
    require '../pages/home.php';
}
require '../templates/layout.html.php';
?>
