<?php
require '../functions/loadTemplate.php';
require '../dbconnection.php';
require '../pages/' . $_GET['page'] . '.php';
require '../templates/layout.html.php';
?>
