<?php
class MealController {
    private $mealsTable;
    public function __construct($mealsTable) {
        $this->mealsTable = $mealsTable;
    }
    public function list() {
        $meals = $this->mealsTable->findAll();
        return [
            'template' => 'list.html.php',
            'title' => 'Meal list',
            'variables' => [
                'meals' => $meals
                ]
            ];
    }
    public function delete() {
        $this->mealsTable->delete($_POST['id']);
        header('location: /meal/list');
    }
    public function home() {
        $meal = $this->mealsTable->find('id', 1);
        return [
            'template' => 'home.html.php',
            'variables' => ['meal' => $meal[0]],
            'title' => 'Internet Meal Database'
        ];
    }
    public function editSubmit() {
            $date = new DateTime();
    
            $meal = $_POST['meal'];
            $meal['mealdate'] = $date->format('Y-m-d H:i:s');
    
            $this->mealsTable->save($meal);
    
            header('location: /meal/list');
            
        }
       public function edit() {
            if (isset($_GET['id'])) {
                $result = $this->mealsTable->find('id', $_GET['id']);
                $meal = $result[0];
            }
            else {
                $meal = false;
            }
            return [
                'template' => 'editmeal.html.php',
                'variables' => ['meal' => $meal],
                'title' => 'Edit meal'
            ];
        }
    }
