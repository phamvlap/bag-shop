<?php

namespace App\Models;

use App\Core\PDOFactory;
use \PDO;

class Model {
	private PDO $pdo;

	protected function __construct() {
		$config = [
			'DB_HOST' => $_ENV['DB_HOST'],
			'DB_NAME' => $_ENV['DB_NAME'],
			'DB_USER' => $_ENV['DB_USER'],
			'DB_PASS' => $_ENV['DB_PASS']
		];
		$db = new PDOFactory(config: $config);
		$this->pdo = $db->connect();
	}

	protected function getPDO(): PDO {
		return $this->pdo;
	}

	# set record into table
	public function set(string $table, array $record): bool {
		$keys = array_keys($record);
		$strKey = join(', ', $keys);
		$arrParams = array_map(fn($key) => (":$key"), $keys);
		$strParams = join(', ', $arrParams);

		$query = "insert into $table ($strKey) values ($strParams);";

		$stmt = $this->pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $record[$key]);
		}
		return $stmt->execute();
	}

	# get all records in a table
	public function getAll(string $table): array {
		$query = "select * from $table;";
		$stmt = $this->pdo->query($query);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get record in a table by ID
	public function getByID(string $table, string $idName, int $id): array {
		$query = "select * from $table where $idName = :$idName;";

		$stmt = $this->pdo->prepare($query);
		$stmt->bindValue(":$idName", $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	# update record of table
	public function update(string $table, string $idName, int $id, array $newValue): bool {
		$keys = array_keys($newValue);
		$arrFields = array_map(fn($key) => ("$key = :$key"), $keys);
		$strFields = join(', ', $arrFields);
		$query = "update $table set $strFields where $idName = :$idName;";

		$stmt = $this->pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $newValue[$key]);
		}
		$stmt->bindValue(":$idName", $id);
		return $stmt->execute();
	}

	# delete record from table
	public function delete(string $table, string $idName, int $id): bool {
		$query = "delete from $table where $idName = :$idName";

		$stmt = $this->pdo->prepare($query);
		$stmt->bindValue(":$idName", $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	# get records in table by attributes
	public function getByProps(string $table, array $props): array {
		$keys = array_keys($props);
		$params = array_map(fn($key) => ("$key = :$key"), $keys);
		$strParams = join(' and ', $params);
		$query = "select * from $table where $strParams";

		$stmt = $this->pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $props[$key]);
		}
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}