<?php
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Kate Kitchen - Home';
$output = loadTemplate('../templates/home.html.php', []);
require '../templates/layout.html.php';
?>
