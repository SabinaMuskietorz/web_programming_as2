<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
require '../classes/Databasetable.php';
require '../Controllers/DishController.php';
require '../Controllers/CategoryController.php';
require '../Controllers/UserController.php';
require '../Controllers/ReviewController.php';

$usersTable = new DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new DatabaseTable($pdo, 'review', 'idreview');

$controllers = [];
$controllers['dish'] = new DishController($dishesTable);
$controllers['user'] = new UserController($usersTable);
$controllers['category'] = new CategoryController($categoriesTable);
$controllers['review'] = new ReviewController($reviewsTable);

$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if($route == '') {
    $page = $controllers['dish']->home();
}
else {
    list($controllerName, $functionName) = explode('/', $route);
    $controller = $controllers[$controllerName];
    $page = $controller->functionName();
}
$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require '../templates/layout.html.php';
?>
