<?php
namespace Hairdresser\Controllers;
class Category {
    private $categoriesTable;
    public function __construct($categoriesTable) {
        $this->categoriesTable = $categoriesTable;
    }
    //list categories
    public function list() {
        $categories = $this->categoriesTable->findAll();
        return [
            'template' => 'categories.html.php',
            'title' => 'Category list',
            'variables' => [
                'categories' => $categories
            ]
            ];
    }
    //make categories visible for customers
    public function appearSubmit() {
        $data['id'] = $_POST['id'];
        $data['visibility'] = 'shown';
        $this->categoriesTable->save($data);
        header('location: /category/list');
      }
      //make categories hidden from customers
      public function hideSubmit() {
        $data['id'] = $_POST['id'];
        $data['visibility'] = 'hidden';
        $this->categoriesTable->save($data);
        header('location: /category/list');
      }
      //delete category
    public function deleteSubmit() {
        $categories = $this->categoriesTable->delete($_POST['id']);

        header('location: /category/list');
	}
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
    //add or edit if record exists
    public function editSubmit() {
        $data = $_POST['category'];
        $this->categoriesTable->save($data);
        header('location: /page/categories');
  }
        public function edit() {
            if (isset($_GET['id'])) {
                $result = $this->categoriesTable->find('id', $_GET['id'])[0];
                //$templateVars = $result[0];
            }
        
            return [
                'template' => 'editcategory.html.php',
                'variables' => [
                    'category' => $result  ?? null
                ],
                'title' => 'Edit category'
            ];
        }
}
