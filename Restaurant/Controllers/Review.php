<?php
namespace Restaurant\Controllers;
class Review {
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
                $review = $reviewsTable->find('idreview', $_GET['idreview']);
            }
            else {
                $review = false;
            }
            return [
                'template' => 'editreview.html.php',
                'variables' => ['values' => $values],
                'title' => 'Edit review'
            ];
        }
    }
}