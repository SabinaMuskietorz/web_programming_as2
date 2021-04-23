<?php
namespace Restaurant\Controllers;
class Dish {
    private $dishesTable;
    public function __construct($dishesTable) {
        $this->dishesTable = $dishesTable;
    }
    public function delete() {
        $this->dishesTable->delete($_POST['id']);

        header('location: /admin');
    }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
    public function edit() {
        if (isset($_POST['submit'])) {

            $record = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'categoryId' => $_POST['categoryId'],
                'visibility' => $_POST['visibility'],
                'id' => $_GET['id']
            ];
            $this->$dishesTable->save($record);
            $output = 'Dish saved';
        }
        else {
            if (isset($_GET['id'])) {
                $dish = $dishesTable->find('id', $_GET['id']);
            }
            else {
                $dish = false;
            }
            return [
                'template' => 'editdish.html.php',
                'variables' => ['record' => $record],
                'title' => 'Edit dish'
            ];
        }
    }
}