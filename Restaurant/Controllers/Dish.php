<?php
namespace Restaurant\Controllers;
class Dish {
    private $dishesTable;
    private $reviewsTable;
    public function __construct($dishesTable, $reviewsTable) {
        $this->dishesTable = $dishesTable;
        $this->reviewsTable = $reviewsTable;

    }
    public function delete() {
        $this->dishesTable->delete($_POST['id']);

        header('location: /admin');
    }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen',
            'variables' => []
        
        ];

    }
    public function list() {
        if(isset ($_GET['id'])) {
        $dishes = $this->dishesTable->find( 'categoryId', $_GET['id']);
        $title= $dishes[0]->getCategory()->name;
        
        }

        else { 
            $dishes = $this->dishesTable->findAll();
            $title = 'Dishes';
        }
        return [
            'template' => 'list.html.php',
            'title' => 'Menu',
            'variables' => [
                'dishes' => $dishes,
                'title' => $title
            ] 
            ];
        
        }
    public function show() {
        $dish = $this->dishesTable->find( 'id', $_GET['id']);
        $reviews = $this->reviewsTable->find( 'dishId', $_GET['id']);
        return [
            'template' => 'showdish.html.php',
            'title' => 'Display',
            'variables' => [
                'dish' => $dish[0],
                'reviews' => $reviews
            ] 
            ];
    }


    public function editSubmit() {
        
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
        public function edit() {
        if (isset($_GET['id'])) {
            $dish = $this->dishesTable->find('id', $_GET['id']);
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