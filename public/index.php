<?php
require '../autoloader.php';
$routes = new \Restaurant\Routes();
$entryPoint = new \PRO2021\EntryPoint($routes);
$entryPoint->run();
?>


