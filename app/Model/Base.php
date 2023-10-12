<?php

namespace App\Model;

use App\Core\Database;
use PDO;

class Base extends Database {
	private $_pdo;

	public function __construct() {
		parent::__construct();
		$this->_pdo = parent::connect();
	}

	protected function getPDO() {
		return $this->_pdo;
	}

	public function setRecord(string $table, array $record) {
		$keys = array_keys($record);
		$strKey = join(', ', $keys);
		$arrParams = array_map(fn($key) => (":$key"), $keys);
		$strParams = join(', ', $arrParams);

		$query = "insert into $table ($strKey) values ($strParams);";

		$stmt = $this->_pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $record[$key]);
		}
		$stmt->execute();
	}

	public function getAll(string $table) {
		$query = "select * from $table;";
		$statement = $this->_pdo->query($query);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getByID(string $table, string $idName, int $id) {
		$query = "select * from $table where $idName = :$idName;";

		$stmt = $this->_pdo->prepare($query);
		$stmt->bindValue(":$idName", $id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function update(string $table, string $idName, int $id, array $newValue) {
		$keys = array_keys($newValue);
		$arrFields = array_map(fn($key) => ("$key = :$key"), $keys);
		$strFields = join(', ', $arrFields);
		$query = "update $table set $strFields where $idName = :$idName;";

		$stmt = $this->_pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $newValue[$key]);
		}
		$stmt->bindValue(":$idName", $id);
		$stmt->execute();
	}

	public function delete(string $table, string $idName, int $id) {
		$query = "delete from $table where $idName = :$idName";

		$stmt = $this->_pdo->prepare($query);
		$stmt->bindValue(":$idName", $id);
		$stmt->execute();
	}

	public function isExistRecord(string $table, string $idName, int $id) {
		$result = self::getByID($table, $idName, $id);
		return count($result) > 0 ? true : false;
	}

	public function getByProps(string $table, array $props) {
		$keys = array_keys($props);
		$params = array_map(fn($key) => ("$key = :$key"), $keys);
		$strParams = join(' and ', $params);
		$query = "select * from $table where $strParams";

		$stmt = $this->_pdo->prepare($query);
		foreach($keys as $key) {
			$stmt->bindValue(":$key", $props[$key]);
		}
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}