<?php
namespace Iddb\Entity;
class Meal {
    public $id;
    public $mealDescription;
    public $mealPrice;
    public $categoryId;
    public function __construct(\CSY2028\DatabaseTable $categoriesTable) {
        $this->categoriesTable = $categoriesTable;
    }
    public function getCategory() {
        return $this->categoriesTable->find('id', $this->categoryId)[0];
    }
}
