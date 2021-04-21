<?php
class CategoryController {
    private $categoriesTable;
    public function __construct($categoriesTable) {
        $this->categoriesTable = $categoriesTable;
    }
    public function delete() {
        $this->categoriesTable->delete($_POST['id']);

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
 
            $templateVars = [
                'name' => $_POST['name'],
                'id' => $_POST['id']
            ];
    
            $categoriesTable->save($templateVars);
            $output = 'Category saved';
        }
        else {
            if (isset($_GET['id'])) {
                $result = $categoriesTable->find('id', $_GET['id']);
                $templateVars = $result[0];
            }
            else {
                $templateVars = false;
            }
            return [
                'template' => 'editcategory.html.php',
                'variables' => ['templateVars' = $templateVars],
                'title' => 'Edit category'
            ];
        }
    }
}