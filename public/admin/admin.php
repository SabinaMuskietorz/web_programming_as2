<?php
session_start();
require '../loadTemplate.php';
$title = 'Admin';
require '../dbconnection.php';
require '../templates/layout.html.php';



		if (isset($_SESSION['admin'])) {
		
		$output = '<a class="new" href="adddish.php">Add new dish</a>

			<table>
			<thead>
			<tr>
			<th>Title</th>
			<th style="width: 15%">Price</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 15%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>';
			
			
			require '../templates/adminlist.html.php';
			?>
			</thead>
			</table>
			

         <?php
		}
		else if (isset($_SESSION['client'])) {
			echo 'You are not logged in as admin';
		}

		else {
			echo 'You are not logged in. <a href="login.php">Click here to log in</a>';
			require '../templates/login.html.php';

		}
	
?>

