<?php
namespace Restaurant\Entity;
class Category {
	public $categoriesTable;
	public $id;
	public $name;
	

	public function __construct(\PRO2021\DatabaseTable $categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}
}
?>