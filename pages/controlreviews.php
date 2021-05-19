<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
$title = 'Manage reviews';
$output = loadTemplate('../templates/reviewlist.html.php', []);
require '../templates/layout.html.php';
?>

