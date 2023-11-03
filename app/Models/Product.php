<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class Product extends Model {
	private string $tableName = 'products';
	
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
			parent::set($this->tableName, $product);
			$this->id_product = $this->getPDO()->lastInsertId();
		}
		return ($this->id_product !== -1);
	}

	public function all() {
		return parent::getAll($this->tableName);
	}

	public function findByID(int $id) {
		return parent::getByID($this->tableName, 'id_product', $id);
	}

	public function findByType(int $type) {
		return parent::getByProps($this->tableName, ['type' => $type]);
	}

	public function edit(int $id, array $updatedFields) {
		return parent::update($this->tableName, 'id_product', $id, $updatedFields);
	}

	public function remove(int $id) {
		return parent::delete($this->tableName, 'id_product', $id);	
	}

	public function getWithOrder(array $orders): array {
		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}

		$strOrder = join(', ', $arrOrders);

		$query = "select * from {$this->tableName} order by {$strOrder}";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getByTypeWithOrder(int $type, array $orders): array {
		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}

		$strOrder = join(', ', $arrOrders);

		$query = "select * from {$this->tableName} where type = :type order by {$strOrder}";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':type', $type, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function count(): int {
		$query = "select count(*) from {$this->tableName}";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	public function paginate(int $offset = 0, int $limit = 10): array {
		$query = "select * from {$this->tableName} limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getNewestProducts(int $quantity = 3): array {
		$query = "select * from {$this->tableName} order by updated_at desc limit :quantity";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function search(string $name, array $orders = []) {
		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}
		$strOrder = join(', ', $arrOrders);

		$order = " order by {$strOrder}";

		$query = "select * from {$this->tableName} where name like '%{$name}%'";

		if(count($orders) > 0) {
			$query .= $order;
		}

		$stmt = $this->getPDO()->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}