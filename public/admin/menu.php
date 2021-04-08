<?php
$title = 'Menu';
$content = '


	<section class="left">
		<ul>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Menu</h2>

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
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>

</section>';
require layout.php;
?>


