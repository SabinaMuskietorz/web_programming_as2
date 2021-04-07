<?php
namespace Ijdb;
class Routes implements \CSY2028\Routes {
    public function getController($name) {
        require '../dbconfig.php';
        $authorsTable = new \CSY2028\DatabaseTable($pdo, 'author', 'id');
        $jokesTable = new \CSY2028\DatabaseTable($pdo, 'joke', 'id', 'Ijdb\Entity\Joke', [$authorsTable]);
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $controllers = [];
        $controllers['joke'] = new \Ijdb\controllers\Joke($jokesTable);
        $controllers['category'] = new \Ijdb\controllers\Category($categoriesTable);
        return $controllers[$name];
    }
    public function getDefaultRoute() {
        return 'joke/home';
    }
    public function checkLogin($route) {
        session_start();
        $loginRoutes = [];
        $loginRoutes['joke/edit'] = true;
        $loginRoutes['category/edit'] = true;
        $loginRoutes['joke/delete'] = true;
        $loginRoutes['joke/delete'] = true;

        $requiresLogin = $loginRoutes[$route] ?? false;
        if ($requiresLogin && !isset($_SESSION['loggedin'])) {
            header('location: /user/login');
            exit();
        }
    }
    public function getLayoutVariables() {
        return ['Jokes' => $this->jokesTable->find()];
    }
}
?>