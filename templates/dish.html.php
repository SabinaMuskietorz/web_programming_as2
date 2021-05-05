<section class="right">

	<h1><?=$title?></h1>

	<ul class="listing">


	<?php
	$stmt = $pdo->prepare('SELECT * FROM dish WHERE categoryId = '$dish->getCategory()->categoryId'' );

	$stmt->execute();


	foreach ($stmt as $record) {
		echo '<li>';

		echo '<div class="details">';
			echo '<h3>£' . $record->price . '</h3>';
		echo '<h2><a href="review.php?id=' . $record->id . '">' . $record->name . '</a></h2>';
	
		echo '<p>' . nl2br($record->description) . '</p>';


		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>