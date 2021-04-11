<?php
$title = 'Kate Kitchen - Home';
ob_start();
require '../templates/home.html.php';
$output = ob_get_clean();
require '../templates/layout.html.php';
?>
