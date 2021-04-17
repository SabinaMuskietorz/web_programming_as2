<?php
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Display menu';

//if category has been chosen, show only the dishes from that category
/*if (isset($_GET['id']))  {
	$categoryStmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
    $values = [
		'id' => $_GET['id']
		 ];       
		 $categoryStmt->execute($values); 
		 $category = $categoryStmt->fetch();
		 
		 $dishesStmt = $pdo->prepare('SELECT * FROM dish WHERE id = :id');
		 $criteria = [
			 'id' => $_GET['id']
		 ];
		$dishesStmt->execute($criteria);
		$dishes = $dishesStmt->fetchAll();

	echo '<h1>' . $category['name'] . ' dishes</h1>';
	//print all the dishes from that category with avability to view the dish
	echo '<ul>';
	foreach ($dishes as $dish) {
		echo '<li><a href="menu.php?id=' . $dish['id'] . '">' . $dish['name'] . '</a></li>';
	}
	echo '</ul>';
}
// if dish was clicked show its name,description and price
else*/ if  (isset($_GET['id']))  {
	$dishesStmt = $pdo->prepare('SELECT * FROM dish WHERE id = :id');
    $values = [
		'id' => $_GET['id']
		 ];   
		 
		 $dishesStmt->execute($values);
		$dishes = $dishesStmt->fetch();
		
		 echo '<h1>' . $dishes['name'] . '</h1>';
		 echo '<p>' .  $dishes['description'] . '</p>';
		 echo '<p>Price:' . $dishes['price'] . '</p>';

		 echo '<p>Reviews:</p>';
		 $reviewQuery = $pdo->prepare('SELECT * FROM review WHERE idreview = :idreview');
		 
		  $values = [
			 'idreview' => $_GET['idreview']
		  ];
		 $reviewQuery->execute($values);
		 echo '<ul>';
		 //check who posted that review 
		 foreach ($reviewQuery as $review) {
			 $namestmt = $pdo->prepare('SELECT * FROM user WHERE id = :id');
			 $values = [
				 'id' => $review['userId']
				 ];
			 $namestmt->execute($values);
			 //fetch gets the first or next row, fetchAll gets all the results
			 $name = $namestmt->fetch();
			 //print all reviews in a list, with the username, that made that review, and the date that it was posted
			 echo '<li><strong>' .
			 $name['username'] .'	' . '</strong>posted the review<strong>' . '	' . $review['reviewText'] . '</strong>
				  on' . '	' . $review['date'] . '</li>';
		 }
	 echo '</ul>';
	  /* if you are logged in, you can make a review on dish */
		 if(isset($_SESSION['loggedin'])) {
			$userQuery = $pdo->prepare('SELECT * FROM user WHERE id = :id');
		$values = [
			'id' => $_SESSION ['id'] 
			
		];
			$userQuery->execute($values);
			//$user = $userQuery->fetch();
	 if (isset($_POST['postreview'])) {  
		 //insert the review with extra info into review table  
		 
		 $date = date('Y-m-d H:i:s');
		 $values = [
			 'date' => $date,
			 'reviewText' => $_POST['reviewText'],
			 'userId' => $_SESSION['id'],
			 'dishId' => $_GET['dishId'],
			 'rating' => $_POST['rating']
			 ];   
		save($pdo, $review, $values, 'idreview');
		
		
		$reviewStmt->execute($values);
		 //$review = $reviewStmt->fetchAll();
		 //print that review was added
		 echo '<p><strong>New review added</strong></p>';
		 //go to view the added review
		 echo '<a href="menu.php?id=' . $_GET['id'] . '">View</a>';

		 }
			 else {
				 //form to add review
				 $templateVars = ['review' => $review];
				 $output = loadTemplate('../templates/review.html.php', $templateVars);
		 }
	 }
	 else {
		 echo '<p>Please <a href="login.php">log in</a> to add review';
	 }
 }
else {
	// if no category has been chosen, print all dishes with avability to view the dish
	/*$dishesStmt = $pdo->prepare('SELECT * FROM dish');
	$dishesStmt->execute();
	echo '<ul>';
	foreach ($dishesStmt as $dish) {
		echo '<li><a href="menu.php?id=' . $dish['id'] . '">' . $dish['name'] . '</a></li>';
	}
	echo '</ul>';
	$templateVars = ['dish' => $dish];*/
				 $output = loadTemplate('../templates/list.html.php', $templateVars);
				 
}
require '../templates/layout.html.php';


?>




