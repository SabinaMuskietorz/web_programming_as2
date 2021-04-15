<?php
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Kate Kitchen - Home';
$output = loadTemplate('../templates/home.html.php', ['categories' => $category]);
require '../templates/layout.html.php';
?>
