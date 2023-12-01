<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class Product extends Model {
	private string $tableName = 'products'; # name of table
	
	private $id_product = -1, $name, $describes, $images, $type, $updated_at, $price;
	
	public function __construct() {
		parent::__construct();
	}

	# fill data for attributes of product from external data
	public function fill(array $data): Product {
		$this->name = htmlspecialchars($data['name'] ?? '');
		$this->describes = htmlspecialchars($data['describes'] ?? '');
		$this->images = htmlspecialchars($data['images'] ?? '');
		$this->type = htmlspecialchars($data['type'] ?? '');
		$this->price = htmlspecialchars($data['price'] ?? '');

		return $this;
	}

	# add product into products table
	public function add(): bool {
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

	# get all products from products table
	public function all(): array {
		return parent::getAll($this->tableName);
	}

	# get product by ID from products table
	public function findByID(int $id): array {
		return parent::getByID($this->tableName, 'id_product', $id);
	}

	# get products by type from products table
	public function findByType(int $type): array {
		return parent::getByProps($this->tableName, ['type' => $type]);
	}

	# update product into products table
	public function edit(int $id, array $updatedFields): bool {
		return parent::update($this->tableName, 'id_product', $id, $updatedFields);
	}

	# remove product from products table
	public function remove(int $id): bool {
		return parent::delete($this->tableName, 'id_product', $id);
	}

	# get products base on attribute's order from products table
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

	# get products base on type and attribute's order from products table
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

	# count all items in products table
	public function count(): int {
		$query = "select count(*) from {$this->tableName}";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	# count all items by type in products table
	public function countByType(int $type): int {
		$query = "select count(*) from {$this->tableName} where type = :type";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':type', $type, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	# get items with offset and limit in products table
	public function paginate(int $offset = 0, int $limit = 10): array {
		$query = "select * from {$this->tableName} limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get newest products from products table
	public function getNewestProducts(int $quantity = 3): array {
		$query = "select * from {$this->tableName} order by updated_at desc limit :quantity";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get items base on search value and can attribute's order in products table
	public function search(string $name, array $orders = []): array {
		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}
		$strOrder = join(', ', $arrOrders);

		$order = " order by {$strOrder}";

		$query = "select * from {$this->tableName} where name like :name";

		if(count($orders) > 0) {
			$query .= $order;
		}

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get items by type, offset and limit in products table
	public function paginateWithType(int $type, int $offset = 0, int $limit = 10): array {
		$query = "select * from {$this->tableName} where type = :type limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':type', $type, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# count search result in products table
	public function countSearchResult(string $name): int {
		$query = "select count(*) from {$this->tableName} where name like :name";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	# get items by name, attribute's order, offset and limit in products table
	public function paginateWithSearch(string $name, array $orders = [], int $offset = 0, int $limit = 12): array {
		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}
		$strOrder = join(', ', $arrOrders);

		$order = " order by {$strOrder}";

		$query = "select * from {$this->tableName} where name like :name";

		if(count($orders) > 0) {
			$query .= $order;
		}

		$query .= " limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get items by filters, attribute's order, offset and limit in products table
	public function paginateWithFilter(array $orders, array $filters, int $offset = 0, int $limit = 10): array {
		$arrFilters = [];
		foreach($filters as $key => $value) {
			array_push($arrFilters, " $key = :$key");
		}
		$strFilters = join(', ', $arrFilters);

		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}
		$strOrder = join(', ', $arrOrders);

		$query = "select * from {$this->tableName}";
		if(count($filters) > 0) {
			$query .= " where {$strFilters}";
		}
		if(count($orders) > 0) {
			$query .= " order by {$strOrder}";
		}
		$query .= " limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		if(count($filters) > 0) {
			foreach($filters as $key => $value) {
				$stmt->bindValue(":{$key}", $value);
			}
		}
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# count filtered result in products table
	public function countFilterResult(array $filters = []): int {
		$arrFilters = [];
		foreach($filters as $key => $value) {
			array_push($arrFilters, "$key = :$key");
		}
		$strFilters = join(' and', $arrFilters);

		$query = "select count(*) from {$this->tableName}";
		if(count($filters) > 0) {
			$query .= " where {$strFilters}";
		}

		$stmt = $this->getPDO()->prepare($query);
		if(count($filters) > 0) {
			foreach($filters as $key => $value) {
				$stmt->bindValue(":$key", $value);
			}
		}
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	# get items by name, filters, attribute's order, offset and limit in products table
	public function searchWithFilter(string $name, array $orders, array $filters, int $offset = 0, int $limit = 10): array {
		$arrFilters = [];
		foreach($filters as $key => $value) {
			array_push($arrFilters, " $key = :$key");
		}
		$strFilters = join(', ', $arrFilters);

		$arrOrders = [];
		foreach($orders as $key => $value) {
			array_push($arrOrders, "$key $value");
		}
		$strOrder = join(', ', $arrOrders);

		$query = "select * from {$this->tableName} where name like :name";
		if(count($filters) > 0) {
			$query .= " and {$strFilters}";
		}
		if(count($orders) > 0) {
			$query .= " order by {$strOrder}";
		}
		$query .= " limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
		if(count($filters) > 0) {
			foreach($filters as $key => $value) {
				$stmt->bindValue(":{$key}", $value);
			}
		}
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}