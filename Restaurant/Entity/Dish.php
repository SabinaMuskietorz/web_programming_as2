<?php
namespace Restaurant\Entity;
class Dish {
	public $categoriesTable;
	public $description;
    public $name;
	public $price;
    public $visibility;
	public $id;
	public $categoryid;

	public function __construct(\PRO2021\DatabaseTable $categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}

	public function getCategory() {
		return $this->categoriesTable->find('id', $this->categoryid)[0];
	}
}