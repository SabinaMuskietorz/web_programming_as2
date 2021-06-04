<?php
require '../functions/loadTemplate.php';
$title = 'Admin';
require '../dbconnection.php';
$output = loadTemplate('../templates/adminlist.html.php', []);
require '../templates/layout.html.php';
?>