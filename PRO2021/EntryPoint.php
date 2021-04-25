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
		
		if ($route == '') {
			$route = $this->routes->getDefaultRoute();
		}
		
		list($controllerName, $functionName) = explode('/', $route);
		  
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$functionName = $functionName . 'Submit';
		}

	    $controller = $this->routes->getController($controllerName);

	    $page = $controller->$functionName();
		
		

		$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);

		$title = $page['title'];

		require '../templates/layout.html.php';
	}

	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}
