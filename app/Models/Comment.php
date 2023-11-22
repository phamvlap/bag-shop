<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class Comment extends Model {
	private string $tableName = 'comments'; # name of table
	private $id_comment = -1, $user_name, $user_phone_number, $content, $id_product;

	public function __construct() {
		parent::__construct();
	}

	# fill data for attributes of comment from external data
	public function fill(array $data) {
		$this->user_name = htmlspecialchars($data['user_name'] ?? '');
		$this->user_phone_number = htmlspecialchars($data['user_phone_number'] ?? '');
		$this->content = htmlspecialchars($data['content'] ?? '');
		$this->id_product = htmlspecialchars($data['id_product'] ?? 0);

		return $this;
	}

	# add comment into comments table
	public function add() {
		$comment = [
			'user_name' => $this->user_name,
			'user_phone_number' => $this->user_phone_number,
			'content' => $this->content,
			'id_product' => $this->id_product
		];

		if($this->id_comment === -1) {
			parent::set($this->tableName, $comment);
			$this->id_comment = $this->getPDO()->lastInsertId();
		}

		return parent::getByID($this->tableName, 'id_comment', $this->id_comment);
	}

	# get comments by ID product in comment table
	public function getByItem(int $id_product) {
		return parent::getByProps($this->tableName, ['id_product' => $id_product]);
	}

	# get newest comments by ID product in comment table	
	public function getNewestByItem(int $id_product) {
		$query = "select * from {$this->tableName} where id_product = :id_product order by created_at desc";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':id_product', $id_product, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}