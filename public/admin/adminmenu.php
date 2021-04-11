<?php
require '../loadTemplate.php';
$title = 'Menu';
require '../dbconnection.php';
require '../templates/layout.html.php';
session_start();


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


		

			<a class="new" href="adddish.php">Add new dish</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$stmt = $pdo->query('SELECT * FROM menu');

			foreach ($stmt as $record) {
				echo '<tr>';
				echo '<td>' . $record['name'] . '</td>';
				echo '<td>' . $record['price'] . '</td>';
				echo '<td><a style="float: right" href="editdish.php?id=' . $record['id'] . '">Edit</a></td>';
	
				echo '<td><form method="post" action="deletedish.php">
				<input type="hidden" name="id" value="' . $record['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';
			


		}

		else {
			require '../templates/login.html.php';
		}
	


