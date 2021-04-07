<?php
require '../autoload.php';
$routes = new \Iddb\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
?>