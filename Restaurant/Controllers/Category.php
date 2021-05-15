<?php
namespace Restaurant\Controllers;
class Category {
    private $categoriesTable;
    public function __construct($categoriesTable) {
        $this->categoriesTable = $categoriesTable;
    }
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
    public function delete() {
		$categories = $this->categoriesTable->delete($_POST['id']);

		header('location: /category/list');
	}
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
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
