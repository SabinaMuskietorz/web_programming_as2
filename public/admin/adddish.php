<?php
$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();
require '../loadTemplate.php';
$title = 'Add new dish';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO menu (name, description, price, categoryId, visibility)
							   VALUES (:name, :description, :price, :categoryId, :visibility)');

		$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'visibility'=> $_POST['visibility']
		];

		$stmt->execute($criteria);

		echo 'Dish Added';
	}
	else {
		
		$output = loadTemplate('../templates/adddish.html.php', []);
		
		
		}
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
require '../templates/layout.html.php';


