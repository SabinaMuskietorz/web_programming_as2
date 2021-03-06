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
    //delete dish
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
    //make dish visible for customers
    public function appearSubmit() {
        $data['id'] = $_POST['id'];
        $data['visibility'] = 'shown';
        $this->dishesTable->save($data);
        header('location: /page/admin');
      }
      //hide dish from customers
      public function hideSubmit() {
        $data['id'] = $_POST['id'];
        $data['visibility'] = 'hidden';
        $this->dishesTable->save($data);
        header('location: /page/admin');
      }
      //list all dishes
    public function list() {
        if(isset ($_GET['id'])) {
            //find dishes in specific category if selected
        $dishes = $this->dishesTable->find( 'categoryId', $_GET['id']);
        $title = $dishes[0]->getCategory()->name;
    }
    //if category not selected, list all dishes
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
        //if user clicks view more, show all the reviews
        if (isset($_GET['show'])) {
            $reviews = $this->reviewsTable->find( 'dishId', $_GET['id']);
        }
        //otherwise limit number to 3 best reviews 
        else {
        $reviews = $this->reviewsTable->findSome( 'dishId', $_GET['id'], 'rating');
        }
        return [
            'template' => 'showreviews.html.php',
            'title' => 'Display',
            'variables' => [
                'dish' => $dish[0],
                'reviews' => $reviews
            ] 
            ];
    }
    //save dish or edit if already exists in database
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
                /* Fetches the value of $result and returns 'null'
                 if it does not exist.
                https://www.php.net/manual/en/migration70.new-features.php*/
                'dish' => $result  ?? null
            ],
            'title' => 'Edit dish'
        ];
    }
}