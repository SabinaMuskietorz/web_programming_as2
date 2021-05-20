<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
$title = 'Manage users';
$output = loadTemplate('../templates/userlist.html.php', []);
require '../templates/layout.html.php';
?>

