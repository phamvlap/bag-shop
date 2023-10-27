<?php

namespace App\Models;

use App\Models\Model;

class Customer extends Model {
	const TABLE_NAME = 'customers';

	private $id_customer = -1, $name, $username, $password, $phone_number, $gender, $email, $address;

	public function __construct() {
		parent::__construct();
	}

	public function fill(array $data) {
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

	public function add() {
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
			parent::set(self::TABLE_NAME, $customer);
			$this->id_customer = $this->getPDO()->lastInsertId();
		}
	}

	public function all() {
		return parent::getAll(self::TABLE_NAME);
	}

	public function findByID(int $id) {
		return parent::getByID(self::TABLE_NAME, 'id_customer', $id);
	}

	public function findByProps(array $props) {
		return parent::getByProps(self::TABLE_NAME, $props); 
	}

	public function edit(int $id, array $newInfo) {
		return parent::update(self::TABLE_NAME, 'id_customer', $id, $newInfo);
	}

	public function remove(int $id) {
		parent::delete(self::TABLE_NAME, 'id_customer', $id);
	}

	public function matchPassword(string $pwd) {
		return password_verify($this->password, $pwd);
	}

	public function getID(): int {
		return $this->id_customer;
	}
}