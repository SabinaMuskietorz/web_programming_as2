<section class="right">

	<h1>Mains</h1>

	<ul class="listing">


	<?php
	$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student');
	$stmt = $pdo->prepare('SELECT * FROM dish WHERE categoryId = 2');

	$stmt->execute();


	foreach ($stmt as $record) {
        /*if($dish['visibility'] = 'hidden') {*/
		echo '<li>';

		echo '<div class="details">';
			echo '<h3>£' . $record->price . '</h3>';
			echo '<h2><a href="review.php?id=' . $record->id . '">' . $record->name . '</a></h2>';
	
		echo '<p>' . nl2br($record->description) . '</p>';


		echo '</div>';
		echo '</li>';
	}
    /*else {
        echo 'nothing to show';
    }
}*/

	?>

</ul>

</section>