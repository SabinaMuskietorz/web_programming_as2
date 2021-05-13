<?php
namespace Restaurant;

class Routes implements \PRO2021\Routes {
	//global variables
	private $usersTable;
	private $categoriesTable;
	private $dishesTable;
	private $reviewsTable;
	public function getController($name) {
		require '../dbconnection.php';
		$this->usersTable = new \PRO2021\DatabaseTable($pdo, 'user', 'iduser',  '\Restaurant\Entity\User', $entityConstructor = []);
		$this->categoriesTable = new \PRO2021\DatabaseTable($pdo, 'category', 'id', '\Restaurant\Entity\Category', $entityConstructor = []);
		$this->dishesTable = new \PRO2021\DatabaseTable($pdo, 'dish', 'id', '\Restaurant\Entity\Dish', [$this->categoriesTable]);
		$this->reviewsTable = new \PRO2021\DatabaseTable($pdo, 'review', 'idreview', '\Restaurant\Entity\Review', [$this->usersTable]);
        
     
		$controllers = [];
		$controllers['category'] = new \Restaurant\Controllers\Category($this->categoriesTable);
		$controllers['user'] = new \Restaurant\Controllers\User($this->usersTable);
		$controllers['dish'] = new \Restaurant\Controllers\Dish($this->dishesTable, $this->reviewsTable);
		$controllers['review'] = new \Restaurant\Controllers\Review($this->reviewsTable);
		$controllers['page'] = new \Restaurant\Controllers\Page();
		return $controllers[$name];
	}
    
	public function getDefaultRoute() {
		return 'page/home';
	}
	public function getCategories() {
		return $this->categoriesTable->findAll();
	}

	
	public function checkLogin($route) {
		session_start();
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

		$loginRoutes['dish/edit'] =  true;
		$loginRoutes['dish/delete'] = true;
		$loginRoutes['review/edit'] =  true;
		$loginRoutes['review/delete'] = true;
		$loginRoutes['user/edit'] =  true;
		$loginRoutes['user/delete'] = true;
		$loginRoutes['categor/edit'] =  true;
		$loginRoutes['category/delete'] = true;

		$requiresPermission = $loginRoutes[$route] ?? false;
		if ($requiresPermission && !isset($_SESSION['admin'])) {
			header('location: /page/home');
			exit();
		}

	}
}

?>

