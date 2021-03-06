<?php
namespace PRO2021;
class EntryPoint {
	private $routes;

	public function __construct(Routes $routes) {
		$this->routes = $routes;
	}

	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

		$this->routes->checkLogin($route);
		//if no route is selected go to default
		if ($route == '') {
			$route = $this->routes->getDefaultRoute();
		}
		
		list($controllerName, $functionName) = explode('/', $route);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			/* this portion of code in the IF statement will ONLY be run 
		if you are accessing yourPage.php page via Posting a form. 
		https://stackoverflow.com/questions/50705889/what-does-this-serverrequest-method-post-do/50706079 */
			$functionName = $functionName . 'Submit';
		}

	    $controller = $this->routes->getController($controllerName);
		$page = $controller->$functionName();
		$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
		$title = $page['title'];
		$categories = $this->routes->getCategories();
		require '../templates/layout.html.php';
	}

	public function loadTemplate($fileName, $templateVars=[]) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}
