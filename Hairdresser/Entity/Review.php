<?php
namespace Hairdresser\Entity;
class Review {
	public $usersTable;
	public $dishesTable;
	public $name;
	public $reviewText;
	public $date;
	public $id;
	public $rating;
	public $iduser;
	public $username;
	public $visibility;
	public $dishId;


	public function __construct(\PRO2021\DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}

	public function getUser() {
		return $this->usersTable->find('id', $this->iduser)[0];
	}
	public function getDish() {
		return $this->dishesTable->find('dishId', $this->id)[0];
	}
}
?>