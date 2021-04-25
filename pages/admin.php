<?php
require '../functions/loadTemplate.php';
$title = 'Admin';
require '../dbconnection.php';
require '../templates/layout.html.php';



		
		
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
			
