<?php
$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Kate's Kitchen - Admin</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening times:</h3>
				<p>Sun-Thu: 12:00-22:00</p>
				<p>Fri-Sat: 12:00-23:30</p>
			</aside>
			<h1>Kate's Kitchen</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Menu
				<ul>
					<li><a href="/starters.php">Starters</a></li>
					<li><a href="/mains.php">Mains</a></li>
					<li><a href="/dessert.php">Dessert</a></li>

				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>
		</ul>

	</nav>
<img src="/images/randombanner.php"/>
	<main class="sidebar">


	<section class="left">
		<ul>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

<?php

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

		?>


			<h2>Add Dish</h2>

			<form action="adddish.php" method="POST">
				<label>Name</label>
				<input type="text" name="name" />

				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Price</label>
				<input type="text" name="price" />


				<label>Category</label>

				<select name="categoryId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM category');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>
				<label>Visibility</label>
				<select name="visibility">
				<option value="hidden">Hidden</option>
				<option value="shown">Shown</option>

				</select>

				<input type="submit" name="submit" value="Add" />

			</form>



		<?php
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


	?>

</section>
	</main>

	<footer>
		&copy; Kate's Kitchen 2017
	</footer>
</body>
</html>



