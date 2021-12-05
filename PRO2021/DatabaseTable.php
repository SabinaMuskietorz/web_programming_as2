<?php
namespace PRO2021;
class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;

    //constructor
    public function __construct($pdo, $table, $primaryKey, $entityClass, $entityConstructor) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->entityClass = $entityClass;
        $this->entityConstructor = $entityConstructor;
    }

//finds all the records
public function findAll() {
    $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
    $stmt->execute();
    return $stmt->fetchAll();
}
//finds one record
public function find($field, $value) {
    $stmt = $this->pdo->prepare('SELECT * FROM   '   .$this->table. '   WHERE   ' .$field. '    = :value    ');
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}
//limit the result to 3 rows
public function findSome($field, $value, $ordervalue) {
    $stmt = $this->pdo->prepare('SELECT * FROM   '   .$this->table. '   WHERE   ' .$field. '    = :value   ORDER BY ' .$ordervalue. ' DESC LIMIT 3' );
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
    $stmt->execute(['value' => $value]);
    return $stmt->fetchAll();
}

//insert record
public function insert($record) {
    $keys = array_keys($record);
    $values = implode(', ', $keys);
    $valuesWithColon = implode(', :', $keys);
    $stmt = $this->pdo->prepare(' INSERT INTO ' . $this->table . ' ( ' . $values . ' ) VALUES ( :' . $valuesWithColon . ' ) ');
    $stmt->execute($record);
}
//delete record
public function delete($id) {
    $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
    $criteria = [
        'id' => $id
    ];
    $stmt->execute($criteria);
}
//update record
public function update($record) {

    $query = 'UPDATE ' . $this->table . ' SET ';

    $parameters = [];
    foreach ($record as $key => $value) {
           $parameters[] = $key . ' = :' .$key;
    }

    $query .= implode(', ', $parameters);
    $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

    $record['primaryKey'] = $record[$this->primaryKey];

    $stmt = $this->pdo->prepare($query);

    $stmt->execute($record);
}
//save record
public function save($record) {
    //try to insert
    try {
        $this->insert($record);
    }
    //if already exist then update
    catch (\Exception $e) {
        $this->update($record);
    }
}
}