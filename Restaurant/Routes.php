<?php
namespace Restaurant;

class Routes implements \PRO2021\Routes {
	public function getController($name) {
		require '../dbconnection.php';
		$usersTable = new \PRO2021\DatabaseTable($pdo, 'user', 'iduser',  $entityClass = 'stdclass', $entityConstructor = []);
		$dishesTable = new \PRO2021\DatabaseTable($pdo, 'dish', 'id', 'Restaurant\Entity\Dish', [$categoriesTable]);
		$categoriesTable = new \PRO2021\DatabaseTable($pdo, 'category', 'id',  $entityClass = 'stdclass', $entityConstructor = []);
		$reviewsTable = new \PRO2021\DatabaseTable($pdo, 'review', 'idreview', '\Restaurant\Entity\Review', [$usersTable]);






		$controllers = [];
		$controllers['category'] = new Restaurant\Controllers\Category($categoriesTable);
		$controllers['user'] = new Restaurant\Controllers\User($usersTable);
		$controllers['dish'] = new Restaurant\Controllers\Dish($dishesTable);
		$controllers['review'] = new Restaurant\Controllers\Review($reviewsTable);
		return $controllers[$name];
	}
    
	public function getDefaultRoute() {
		return 'dish/home';
	}

	
	public function checkLogin($route) {
		$loginRoutes = [];

		$loginRoutes['/review/editSubmit'] =  true;
		$requiresLogin = $loginRoutes[$route] ?? false;
		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
			header('location: /user/login');
			exit();
		}
	}
	public function checkPermission($route) {
		$loginRoutes = [];

		$loginRoutes['/dish/edit'] =  true;
		$loginRoutes['/dish/delete'] = true;
		$loginRoutes['/review/edit'] =  true;
		$loginRoutes['/review/delete'] = true;
		$loginRoutes['/user/edit'] =  true;
		$loginRoutes['/user/delete'] = true;
		$loginRoutes['/categor/edit'] =  true;
		$loginRoutes['/category/delete'] = true;

		$requiresPermission = $loginRoutes[$route] ?? false;
		if ($requiresPermission && !isset($_SESSION['admin'])) {
			echo 'You do not have permission';
			echo 'Go to <a href=/index.php/login>Log in/>';
			exit();
		}

	}
}

?>

