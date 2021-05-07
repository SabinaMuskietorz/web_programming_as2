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
    public function editSubmit() {
        $date = new \DateTime();
        $review = $_POST['review'];

            $values = [
                'date' => $date->format('Y-m-d H:i:s'),
                'reviewText' => $review['reviewText'],
                'userId' => $_SESSION['id'],
                'dishId' => $review['dishId'],
                //'rating' => $_POST['rating']//
                ];   
            $this->reviewsTable->save($values);
            $output = 'Review saved';
            header('location:/dish/list');
        }
        
        public function edit() {
            if (isset($_GET['idreview'])) {
                $review = $this->reviewsTable->find('idreview', $_GET['idreview']);
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
