<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
$title = 'Register';
$output = loadTemplate('../templates/signin.html.php', []);
require '../templates/layout.html.php';
?>