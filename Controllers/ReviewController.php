<?php
class ReviewController {
    private $reviewsTable;
    public function __construct($reviewsTable) {
        $this->reviewsTable = $reviewsTable;
    }
    public function delete() {
        $this->reviewsTable->delete($_POST['idreview']);

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

            $values = [
                'id'
                'date' => $date,
                'reviewText' => $_POST['reviewText'],
                'userId' => $_SESSION['id'],
                'dishId' => $_GET['dishId'],
                'rating' => $_POST['rating']
                ];   
            $this->$reviewsTable->save($values);
            $output = 'Review saved';
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
                'variables' => ['record' = $record],
                'title' => 'Edit dish'
            ];
        }
    }
}