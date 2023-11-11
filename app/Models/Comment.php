<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class Comment extends Model {
	private string $tableName = 'comments';
	private $id_comment = -1, $name, $phone_number, $content, $id_product;

	public function __construct() {
		parent::__construct();
	}

	public function fill(array $data) {
		$this->name = htmlspecialchars($data['name'] ?? '');
		$this->phone_number = htmlspecialchars($data['phone_number'] ?? '');
		$this->content = htmlspecialchars($data['content'] ?? '');
		$this->id_product = htmlspecialchars($data['id_product'] ?? 0);

		return $this;
	}

	public function add() {
		$comment = [
			'name' => $this->name,
			'phone_number' => $this->phone_number,
			'content' => $this->content,
			'id_product' => $this->id_product
		];

		if($this->id_comment === -1) {
			parent::set($this->tableName, $comment);
			$this->id_comment = $this->getPDO()->lastInsertId();
		}

		return parent::getByID($this->tableName, 'id_comment', $this->id_comment);
	}

	public function getByItem(int $id_product) {
		return parent::getByProps($this->tableName, ['id_product' => $id_product]);
	}

	public function getNewestByItem(int $id_product) {
		$query = "select * from {$this->tableName} where id_product = :id_product order by created_at desc";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':id_product', $id_product, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}