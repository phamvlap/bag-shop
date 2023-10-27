<?php

namespace App;

use PDO;
use PDOException;

class PDOFactory {
	private $host, $dbname, $user, $password;

	public function __construct(array $config) {
		$this->host = $config['DB_HOST'];
		$this->dbname = $config['DB_NAME'];
		$this->user = $config['DB_USER'];
		$this->password = $config['DB_PASS'];
	}

	public function connect(): PDO {
		$dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
		try {
			return new PDO($dsn, $this->user, $this->password);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}