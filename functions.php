<?php
function findAll($pdo, $table) {
    $stmt = $pdo->prepare('SELECT * FROM ' . $table);
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}
function find($pdo, $table, $field, $value) {
    $stmt = $pdo->prepare('SELECT * FROM' . $table . 'WHERE' . $field . ' = :value');
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}

function insert($pdo, $table, $record) {
    $keys = array_keys($record);
    $values = implode(', ', $keys);
    $valuesWithColon = implode(', :', $keys);
    $stmt = $pdo->prepare('INSERT INTO' . $table . '(' . $values . ') VALUES (:' . $valuesWithColon . ')';
    $stmt->execute($record);
}
function delete($pdo, $table, $field, $value) {
    $stmt = $pdo->prepare('DELETE FROM' .  $table . 'WHERE' . $field . ' = :value');
	$stmt->execute(['value' => $value]);
}
function update($pdo, $table, $record, $primaryKey) {

    $query = 'UPDATE' . $table . 'SET ';
    $parameters = [];
    foreach($record as $key => $value) {
        $parameters[] = $key . ' = :' . $key;
    }
    $query .= implode(', ', $parameters);
    $query .= 'WHERE' . $primaryKey . ' = :primaryKey';
    $record['primaryKey'] = $record[$primaryKey];
    $stmt = $pdo->prepare($query);
    $stmt->execute($record);
}