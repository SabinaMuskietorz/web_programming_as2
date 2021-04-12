<?php
require '../loadTemplate.php';
require '../functions.php';
require '../dbconnection.php';
session_start();



	if (isset($_POST['submit'])) {
		$record = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'id' => $_POST['id']
		];
		update($pdo, 'dish', $record, $primaryKey);
		echo 'Dish saved';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$dish = find($pdo, 'dish', 'id', $_GET['id']);
			$output = loadTemplate('../../templates/editdish.html.php', ['dish' => $dish[0]]);
			$title = 'Edit dish';
		?>

			
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

	}
	require '../templates/layout.html.php';
	

