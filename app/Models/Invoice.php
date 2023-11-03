<?php

namespace App\Models;

use App\Models\{Model, Customer};
use PDO;

class Invoice extends Model {
	private string $tableName = 'invoices';

	private $id_invoice = -1, $created_at, $status, $total, $customer, $method_payment;

	public function __construct() {
		parent::__construct();
	}

	public function fill(array $data) {
		$this->status = htmlspecialchars($data['status'] ?? 0);
		$this->total = htmlspecialchars($data['total'] ?? 0);
		$this->method_payment = htmlspecialchars($data['method_payment'] ?? '');
		$customerModel = new Customer();
		$this->customer = $customerModel->fill($_SESSION['user']);

		return $this;
	}

	public function add() {
		$invoice = [
			'status' => $this->status,
			'total' => $this->total,
			'id_customer' => $this->customer->getID(),
			'method_payment' => $this->method_payment
		];

		parent::set($this->tableName, $invoice);
		$this->id_invoice = $this->getPDO()->lastInsertId();

		return $this->id_invoice !== -1;
	}

	public function all() {
		return parent::getAll($this->tableName);
	}

	public function findByID(int $id_invoice) {
		return parent::getByID($this->tableName, 'id_invoice', $id_invoice);
	}

	public function findByIDCustomer(int $id_customer) {
		$query = "select * from {$this->tableName} where id_customer = :id_customer order by created_at desc";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':id_customer', $id_customer, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getID(): int {
		return $this->id_invoice;
	}
}