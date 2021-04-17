<?php
require '../loadTemplate.php';
require '../dbconnection.php';
$title = 'Display reviews';

// if dish was clicked show its name and reviews
 if  (isset($_GET['id']))  {
	$dishesStmt = $pdo->prepare('SELECT * FROM dish WHERE id = :id');
    $values = [
		'id' => $_GET['id']
		 ];   
		 
		 $dishesStmt->execute($values);
		$dishes = $dishesStmt->fetch();
		
		 echo '<h1>' . $dishes['name'] . '</h1>';

		 echo '<p>Reviews:</p>';
		 $reviewQuery = $pdo->prepare('SELECT * FROM review WHERE idreview = :idreview');
		 
		  $values = [
			 'idreview' => $_GET['idreview']
		  ];
		 $reviewQuery->execute($values);
		 echo '<ul>';
		 //check who posted that review 
		 $output = loadTemplate('../templates/displayreview.html.php', $values);
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
	 
	 require '../templates/layout.html.php';

 }
 

?>




