<?php
$title = 'Mains';
$content = '

	<section class="left">
		<ul>
				<li><a href="/starters.php">Starters</a></li>
				<li><a class="current" href="/mains.php">Mains</a></li>
				<li><a href="/dessert.php">Dessert</a></li>		</ul>
	</section>

	<section class="right">

	<h1>Mains</h1>

	<ul class="listing">


	<?php
	$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student');
	$stmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = 2');

	$stmt->execute();


	foreach ($stmt as $record) {
		echo '<li>';

		echo '<div class="details">';
			echo '<h3>£' . $record['price'] . '</h3>';
		echo '<h2>' . $record['name'] . '</h2>';
	
		echo '<p>' . nl2br($record['description']) . '</p>';


		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>';
require layout.php;
?>

