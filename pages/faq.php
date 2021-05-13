<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
$title = 'Kate Kitchen - FAQ';
$output = loadTemplate('../templates/faq.html.php', []);
require '../templates/layout.html.php';
?>
