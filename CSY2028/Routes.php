<?php
namespace CSY2028;
interface Routes {
	public function getController($route);
	public function getDefaultRoute();
	public function checkLogin($route);
}