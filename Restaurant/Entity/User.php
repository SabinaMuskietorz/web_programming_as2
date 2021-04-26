<?php
namespace Restaurant\Entity;
class User {
    public $iduser;
	public $username;
	public $password;
	public $role;
	

	public function __construct(\PRO2021\DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}