<?php


$usersTable = new \PRO2021\DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new \PRO2021\DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new \PRO2021\DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new \PRO2021\DatabaseTable($pdo, 'review', 'idreview');

$controllers = [];
$controllers['dish'] = new Restaurant\Controllers\Dish($dishesTable);
$controllers['user'] = new Restaurant\Controllers\User($usersTable);
$controllers['category'] = new Restaurant\Controllers\Category($categoriesTable);
$controllers['review'] = new Restaurant\Controllers\Review($reviewsTable);

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
