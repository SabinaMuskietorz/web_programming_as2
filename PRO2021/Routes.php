<?php
namespace PRO2021;
interface Routes {
	/*public function getPage($route);*/
	public function getController($route);
	public function getDefaultRoute();
	public function checkLogin($route);
}
?>