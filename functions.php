<?php
function findDish($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM dish WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}
function insertDish($pdo, $values) {
    $stmt = $pdo->prepare('INSERT INTO dish (name, description, price, categoryId, visibility)
							   VALUES (:name, :description, :price, :categoryId, :visibility)');
    $stmt->execute($values);
}
function deleteDish($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM dish WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);
}