<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
	private $host, $dbname, $user, $password;

	protected function __construct($host = 'localhost', $dbname = 'good_store', $user = 'root', $password = '') {
		$this->host = $host;
		$this->dbname = $dbname;
		$this->user = $user;
		$this->password = $password;
	}

	protected function connect() {
		$dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
		try {
			$pdo = new PDO($dsn, $this->user, $this->password);
			return $pdo;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}