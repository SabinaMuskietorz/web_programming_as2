<?php
namespace Restaurant\Controllers;
class Dish {
    private $dishesTable;
    private $reviewsTable;
    private $categoriesTable;

    public function __construct($dishesTable, $reviewsTable, $categoriesTable) {
        $this->dishesTable = $dishesTable;
        $this->reviewsTable = $reviewsTable;
        $this->categoriesTable = $categoriesTable;
    }
    public function deleteSubmit() {
        $dishes = $this->dishesTable->delete($_POST['id']);

        header('location: /page/admin');
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
            'template' => 'showreviews.html.php',
            'title' => 'Display',
            'variables' => [
                'dish' => $dish[0],
                'reviews' => $reviews
            ] 
            ];
    }


    public function editSubmit() {
        $data = $_POST['dish'];
        $this->dishesTable->save($data);
        header('location: /page/admin');
    }
    public function edit() {
        $categories = $this->categoriesTable->findAll();
        if (isset($_GET['id'])) {
            $result = $this->dishesTable->find('id', $_GET['id'])[0];
        }
        return [
            'template' => 'editdish.html.php',
            'variables' => [
                'categories' => $categories,
                'dish' => $result  ?? null
            ],
            'title' => 'Edit dish'
        ];
    }
}