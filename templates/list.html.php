<?php
echo '<ul class="listing">';
$stmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = $_GET[categoryId]');

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
echo '</ul>';
?>

