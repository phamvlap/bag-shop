<?php

namespace App\Models;

use App\Models\Model;

class Customer extends Model {
	private string $tableName = 'customers'; # name of table

	private $id_customer = -1, $name, $username, $password, $phone_number, $gender, $email, $address;

	public function __construct() {
		parent::__construct();
	}

	# fill data for attributes of customer from external data
	public function fill(array $data): Customer {
		$this->id_customer = $data['id_customer'] ?? -1;
		$this->name = htmlspecialchars($data['name'] ?? '');
		$this->username = htmlspecialchars($data['username'] ?? '');
		$this->password = htmlspecialchars($data['password'] ?? '');
		$this->phone_number = htmlspecialchars($data['phone_number'] ?? '');
		$this->gender = htmlspecialchars($data['gender'] ?? '');
		$this->email = htmlspecialchars($data['email'] ?? '');
		$this->address = htmlspecialchars($data['address'] ?? '');

		return $this;
	}

	# add customer into customers table
	public function add(): bool {
		$customer = [
			'name' => $this->name,
			'username' => $this->username,
			'password' => password_hash($this->password, PASSWORD_DEFAULT),
			'phone_number' => $this->phone_number,
			'gender' => $this->gender,
			'email' => $this->email,
			'address' => $this->addres
		];
		
		if($this->id_customer === -1){
			parent::set($this->tableName, $customer);
			$this->id_customer = $this->getPDO()->lastInsertId();
		}
	}

	# get all customers from customers table
	public function all(): array {
		return parent::getAll($this->tableName);
	}

	# get customer by ID from customers table
	public function findByID(int $id): array {
		return parent::getByID($this->tableName, 'id_customer', $id);
	}

	# get customer base on attribute's customer from customers table
	public function findByProps(array $props): array {
		return parent::getByProps($this->tableName, $props); 
	}

	# update info customer into customers table
	public function edit(int $id, array $newInfo): bool {
		return parent::update($this->tableName, 'id_customer', $id, $newInfo);
	}
	
	# check password is match
	public function matchPassword(string $pwd): bool {
		return password_verify($this->password, $pwd);
	}

	# get ID customer
	public function getID(): int {
		return $this->id_customer;
	}
}