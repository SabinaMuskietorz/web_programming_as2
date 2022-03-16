<?php
require '../autoloader.php';
$routes = new \Hairdresser\Routes();
$entryPoint = new \PRO2021\EntryPoint($routes);
$entryPoint->run();
?>