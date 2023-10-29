<?php

namespace App\Models;

use App\Models\Model;

class Product extends Model {
	const TABLE_NAME = 'products';
	
	private $id_product = -1, $name, $describes, $images, $type, $updated_at, $price;
	
	public function __construct() {
		parent::__construct();
	}

	public function fill(array $data) {
		$this->name = htmlspecialchars($data['name'] ?? '');
		$this->describes = htmlspecialchars($data['describes'] ?? '');
		$this->images = htmlspecialchars($data['images'] ?? '');
		$this->type = htmlspecialchars($data['type'] ?? '');
		$this->price = htmlspecialchars($data['price'] ?? '');

		return $this;
	}

	public function add() {
		$product = [
			'name' => $this->name, 
			'describes' => $this->describes,
			'images' => $this->images, 
			'type' => $this->type, 
			'price' => $this->price
		];
		if($this->id_product === -1) {
			parent::set(self::TABLE_NAME, $product);
			$this->id_product = $this->getPDO()->lastInsertId();
		}
		return ($this->id_product !== -1);
	}

	public function all() {
		return parent::getAll(self::TABLE_NAME);
	}

	public function findByID(int $id) {
		return parent::getByID(self::TABLE_NAME, 'id_product', $id);
	}

	public function findByType(int $type) {
		return parent::getByProps(self::TABLE_NAME, ['type' => $type]);
	}

	public function edit(int $id, array $updatedFields) {
		return parent::update(self::TABLE_NAME, 'id_product', $id, $updatedFields);
	}

	public function remove(int $id) {
		return parent::delete(self::TABLE_NAME, 'id_product', $id);	
	}

}