<?php
namespace Restaurant\Controllers;
class Review {
    private $reviewsTable;
    public function __construct($reviewsTable, $dishesTable) {
        $this->reviewsTable = $reviewsTable;
        $this->dishesTable = $dishesTable;
        

    }
    public function deleteSubmit() {
        $reviews = $this->reviewsTable->delete($_POST['id']);

        header('location: /page/controlreviews');
    }
    public function list() {
        if(isset ($_GET['id'])) {
        $reviews = $this->reviewsTable->find( 'dishId', $_GET['id']);
        $title = $reviews[0]->getDish()->name;
        
        }

        else { 
            $reviews = $this->reviewsTable->findAll();
            $title = 'Reviews';
        }
        return [
            'template' => 'reviewlist.html.php',
            'title' => 'Reviews',
            'variables' => [
                'reviews' => $reviews,
                'title' => $title
            ] 
            ];
        
        }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
    public function editSubmit() {
        $date = new \DateTime();
        $data = $_POST['review'];
        $this->reviewsTable->save($data);
            header('location:/review/list');
        }
        
        public function edit() {
            if (isset($_GET['id'])) {
                $result = $this->reviewsTable->find('id', $_GET['id'])[0];
            }
            return [
                'template' => 'editreview.html.php',
                'variables' => ['review' => $result  ?? null],
                'title' => 'Edit review'
            ];
        }
    }
