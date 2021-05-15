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
        $this->categoriesTable->delete($_POST['id']);

        header('location: /category/list');
    }
    public function home(){
        return [
            'template' => 'home.html.php',
            'title' => 'Kate kitchen'
        ];
    }
    public function editSubmit() {
 
            $templateVars = [
                'name' => $_POST['name'],
                'id' => $_POST['id'],
                'visibility' => $_POST['visibility']
            ];
    
            $this->categoriesTable->save($templateVars);
            header('location: /category/list');
        }
        public function edit() {
            if (isset($_GET['id'])) {
                $result = $this->ScategoriesTable->find('id', $_GET['id']);
                $templateVars = $result[0];
            }
            else {
                $templateVars = false;
            }
            return [
                'template' => 'editcategory.html.php',
                'variables' => ['templateVars' => $templateVars],
                'title' => 'Edit category'
            ];
        }
    }
