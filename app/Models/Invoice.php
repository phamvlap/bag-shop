<?php

namespace App\Models;

use App\Models\{Model, Customer};

class Invoice extends Model {
	const TABLE_NAME = 'invoices';

	private $id_invoice = -1, $created_at, $status, $total, $customer;

	public function __construct() {
		parent::__construct();
	}

	public function fill(array $data) {
		$this->status = htmlspecialchars($data['status'] ?? 0);
		$this->total = htmlspecialchars($data['total'] ?? 0);
		$customerModel = new Customer();
		$this->customer = $customerModel->fill($_SESSION['user']);

		return $this;
	}

	public function add() {
		$invoice = [
			'status' => $this->status,
			'total' => $this->total,
			'id_customer' => $this->customer->getID()
		];

		parent::set(self::TABLE_NAME, $invoice);
		$this->id_invoice = $this->getPDO()->lastInsertId();

		return $this->id_invoice !== -1;
	}

	public function all() {
		return parent::getAll(self::TABLE_NAME);
	}

	public function findByID(int $id_invoice) {
		return parent::getByID(self::TABLE_NAME, 'id_invoice', $id_invoice);
	}

	public function findByCustomer(int $id_customer) {
		return parent::getByProps(self::TABLE_NAME, ['id_customer' => $id_customer]);
	}

	public function getID(): int {
		return $this->id_invoice;
	}
}