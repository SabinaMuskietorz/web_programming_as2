<?php
require '../autoloader.php';
echo password_hash('password', PASSWORD_DEFAULT);

$routes = new \Restaurant\Routes();
$entryPoint = new \PRO2021\EntryPoint($routes);
$entryPoint->run();
?>


