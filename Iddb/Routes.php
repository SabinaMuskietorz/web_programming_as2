<?php
namespace Iddb;
class Routes implements \CSY2028\Routes {
    public function getController($name) {
        require '../dbsetup.php';
        $mealsTable = new \CSY2028\DatabaseTable($pdo, 'meal', 'id', 'Iddb\Entity\meal', [$categoriesTable]);
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $controllers = [];
        $controllers['meal'] = new \Ijdb\controllers\Meal($mealsTable);
        $controllers['category'] = new \Ijdb\controllers\Category($categoriesTable);
        return $controllers[$name];
    }
    public function getDefaultRoute() {
        return 'meal/home';
    }
    public function checkLogin($route) {
        session_start();
        $loginRoutes = [];
        $loginRoutes['meal/edit'] = true;
        $loginRoutes['category/edit'] = true;
        $loginRoutes['meal/delete'] = true;
        $loginRoutes['meal/delete'] = true;

        $requiresLogin = $loginRoutes[$route] ?? false;
        if ($requiresLogin && !isset($_SESSION['loggedin'])) {
            header('location: /user/login');
            exit();
        }
    }
}
?>