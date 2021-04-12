<?php
require '../loadTemplate.php';
$title = 'Menu';
require '../dbconnection.php';
require '../templates/layout.html.php';
session_start();


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
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

		else {
			require '../templates/login.html.php';
		}
	
?>

