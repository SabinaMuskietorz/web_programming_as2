<?php
namespace Restaurant\Entity;
class Review {
	public $usersTable;
	public $reviewText;
	public $date;
	public $idreview;
	public $iduser;

	public function __construct(\PRO2021\DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}

	public function getUser() {
		return $this->usersTable->find('id', $this->iduser)[0];
	}
}
?>