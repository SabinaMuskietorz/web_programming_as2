<?php
namespace Restaurant\Entity;
class Review {
	public $usersTable;
	public $name;
	public $reviewText;
	public $date;
	public $idreview;
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
	public function getName() {
		return $this->usersTable->find('name', $this->username)[0];
	}
}
?>