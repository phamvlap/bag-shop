<?php

namespace App\Model;

use App\Model\Base;

class Customer extends Base {
	const TABLE_NAME = 'customers';

	private $db;
	private $id_customer = -1, $name, $username, $password, $avatar, $phone_number, $gender, $email, $address;

	public function __construct() {
		parent::__construct();
		$this->db = parent::getPDO();
	}

	public function fill(array $data) {
		$this->name = $data['name'] ?? '';
		$this->username = $data['username'] ?? '';
		$this->password = $data['password'] ?? '';
		$this->avatar = $data['avatar'] ?? '';
		$this->phone_number = $data['phone_number'] ?? '';
		$this->email = $data['email'] ?? '';
		$this->address = $data['address'] ?? '';
		return $this;
	}

	public function addCustomer() {
		$customer = [
			'name' => htmlspecialchars($this->name),
			'username' => htmlspecialchars($this->username),
			'password' => htmlspecialchars($this->password),
			'avatar' => htmlspecialchars($this->avatar),
			'phone_number' => htmlspecialchars($this->phone_number),
			'gender' => htmlspecialchars($this->gender),
			'email' => htmlspecialchars($this->email),
			'address' => htmlspecialchars($this->address)
		];
		
		if($this->id_customer === -1){
			parent::setRecord(self::TABLE_NAME, $customer);
			$this->id_customer = $this->db->lastInsertId();
			$_SESSION['userid'] = $this->id_customer;
			$_SESSION['username'] = $this->username;
		}
	}

	public function getAllCustomers() {
		return parent::getAll(self::TABLE_NAME);
	}

	public function getCustomerByID(int $id) {
		return parent::getByID(self::TABLE_NAME, 'id_customer', $id);
	}

	public function getCustomerByProps(array $props) {
		return parent::getByProps(self::TABLE_NAME, $props)[0]; 
	}

	public function updateProfileCustomer(int $id, array $newInfo) {
		parent::update(self::TABLE_NAME, 'id_customer', $id, $newInfo);
	}

	public function deleteCustomer(int $id) {
		parent::delete(self::TABLE_NAME, 'id_customer', $id);
	}
}