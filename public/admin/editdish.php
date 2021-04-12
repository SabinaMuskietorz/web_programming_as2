<?php
require '../loadTemplate.php';
require '../functions.php';
require '../dbconnection.php';
session_start();



	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('UPDATE dish
								SET name = :name,
								    description = :description,
								    price = :price,
								    categoryId = :categoryId
								   WHERE id = :id
						');

		$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'id' => $_POST['id']
		];

		$stmt->execute($criteria);


		echo 'Dish saved';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$dish = findDish($pdo, $_GET['id']);
			$output = loadTemplate('../../templates/editdish.html.php', ['dish' => $dish]);
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
	

