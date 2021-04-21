<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
require '../classes/Databasetable.php';
require '../Controllers/DishController.php';

$usersTable = new DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new DatabaseTable($pdo, 'review', 'idreview');

$dishController = new DishController($dishesTable);
$userController = new UserController($usersTable);
$categoryController = new CategoryController($categoriesTable);
$reviewController = new ReviewController($reviewsTable);

if($_SERVER['REQUEST_URI'] !== '/') {
    $functionName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
    $page = $dishController->$functionName();

}
else {
    $page = $dishController->home();
}
$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require '../templates/layout.html.php';
?>
