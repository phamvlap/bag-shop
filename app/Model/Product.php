<?php

namespace App\Model;

use App\Model\Base;

class Product extends Base {
	const TABLE_NAME = 'products';
	private $id_product, $name, $describes, $images, $type_product, $unit, $price;
	
	public function __construct() {
		parent::__construct();
	}

	public function addProduct(string $name = '', string $describes = '', string $images = '', int $type_product = 0, string $unit = '', int $price = 0) {
		$product = [
			'name' => htmlspecialchars($name), 
			'describes' => htmlspecialchars($describes),
			'images' => htmlspecialchars($images), 
			'type_product' => $type_product, 
			'unit' => htmlspecialchars($unit), 
			'price' => $price
		];
		if(!parent::getByProps(self::TABLE_NAME, $product)) {
			parent::setRecord(self::TABLE_NAME, $product);
		}
	}

	public function getAllProducts() {
		return parent::getAll(self::TABLE_NAME);
	}

	public function getProductByID(int $id) {
		return parent::getByID(self::TABLE_NAME, 'id_product', $id);
	}

	public function getProductByType(int $type) {
		return parent::getByProps(self::TABLE_NAME, ['type_product' => $type]);
	}

	public function updateProduct(int $id, array $newProduct) {
		parent::update(self::TABLE_NAME, 'id_product', $id, $newProduct);
	}

	public function deleteProduct(int $id) {
		$product = self::getProductByID($id);
		if($product) {
			parent::delete(self::TABLE_NAME, 'id_product', $id);
		}
	}
}