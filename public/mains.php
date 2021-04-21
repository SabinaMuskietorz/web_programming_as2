<?php
session_start();
$_SESSION ['visibility'] = $dish['visibility'];
require '../functions/loadTemplate.php';
require '../dbconnection.php';
$title = 'Kate Kitchen - Mains';
$output = loadTemplate('../templates/mains.html.php', []);
require '../templates/layout.html.php';
?>


	
	