<?php
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
?>