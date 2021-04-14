<?php 
session_start();
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Log out';
require '../templates/layout.html.php';

//https://www.php.net/manual/en/function.session-destroy.php
//code used to finish/destroy all runnig sessions when user loggs out
session_destroy();
echo '<p>You are now logged out</p>';