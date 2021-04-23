<?php
namespace Restaurant;

class Routes implements \PRO2021\Routes {
	public function getController($name) {
		require '../dbconnection.php';

$usersTable = new \PRO2021\DatabaseTable($pdo, 'user', 'iduser');
$dishesTable = new \PRO2021\DatabaseTable($pdo, 'dish', 'id');
$categoriesTable = new \PRO2021\DatabaseTable($pdo, 'category', 'id');
$reviewsTable = new \PRO2021\DatabaseTable($pdo, 'review', 'idreview');

$controllers = [];
$controllers['user'] = new Restaurant\Controllers\User($usersTable);
$controllers['dish'] = new Restaurant\Controllers\Dish($dishesTable);
$controllers['category'] = new Restaurant\Controllers\Category($categoriesTable);
$controllers['review'] = new Restaurant\Controllers\Review($reviewsTable);
return $controllers[$name];
    }
    public function getDefaultRoute() {
		return 'dish/home';
	}

	public function checkLogin($route) {
		
		$loginRoutes = [];

		$loginRoutes['/dish/edit'] =  true;
		$loginRoutes['/category/edit'] = true;

		$requiresLogin = $loginRoutes[$route] ?? false;

		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
			header('location: /user/login');
			exit();
		}
	}
}
?>

