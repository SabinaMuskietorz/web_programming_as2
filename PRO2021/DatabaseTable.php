<?php
namespace PRO2021;
class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey, $entityClass, $entityConstructor) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->entityClass = $entityClass;
        $this->entityConstructor = $entityConstructor;
    }


public function findAll() {
    $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}
public function find($field, $value) {
    $stmt = $this->pdo->prepare('SELECT * FROM' . $this->table . 'WHERE' . $field . ' = :value');
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}

public function insert($record) {
    $keys = array_keys($record);
    $values = implode(', ', $keys);
    $valuesWithColon = implode(', :', $keys);
    $stmt = $this->pdo->prepare('INSERT INTO' . $this->table . '(' . $values . ') VALUES (:' . $valuesWithColon . ')');
    $stmt->execute($record);
}
public function delete($field, $value) {
    $stmt = $this->pdo->prepare('DELETE FROM' .  $this->table . 'WHERE' . $field . ' = :value');
	$stmt->execute(['value' => $value]);
}
public function update($record) {

    $query = 'UPDATE' . $this->table . 'SET ';
    $parameters = [];
    foreach($record as $key => $value) {
        $parameters[] = $key . ' = :' . $key;
    }
    $query .= implode(', ', $parameters);
    $query .= 'WHERE' . $this->primaryKey . ' = :primaryKey';
    $record['primaryKey'] = $record[$this->primaryKey];
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($record);
}
public function save($record) {
    try {
        $this->insert($record);
    }
    catch (Exception $e) {
        $this->update($record);
    }
}
}