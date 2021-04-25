<?php
namespace PRO2021;
interface Routes {
	/*public function getPage($route);*/
	public function getController($name);
	public function getDefaultRoute();
	public function checkLogin($route);
	public function checkPermission($route);
	
}
?>