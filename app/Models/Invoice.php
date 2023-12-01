<?php

namespace App\Models;

use App\Models\{Model, Customer};
use PDO;

class Invoice extends Model {
	private string $tableName = 'invoices'; # name of table

	private $id_invoice = -1, $created_at, $status, $total, $customer, $method_payment;

	public function __construct() {
		parent::__construct();
	}

	# fill data for attributes of invoice from external data
	public function fill(array $data): Invoice {
		$this->status = htmlspecialchars($data['status'] ?? 0);
		$this->total = htmlspecialchars($data['total'] ?? 0);
		$this->method_payment = htmlspecialchars($data['method_payment'] ?? '');
		$customerModel = new Customer();
		$this->customer = $customerModel->fill($_SESSION['user']);

		return $this;
	}

	# add invoice into invoices table
	public function add(): bool {
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

	# get all invoices from products table
	public function all(): array {
		return parent::getAll($this->tableName);
	}

	# get invoice by ID from invoices table
	public function findByID(int $id_invoice): array {
		return parent::getByID($this->tableName, 'id_invoice', $id_invoice);
	}

	# get invoice by ID customer from invoices table
	public function findByIDCustomer(int $id_customer) {
		$query = "select * from {$this->tableName} where id_customer = :id_customer order by created_at desc";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':id_customer', $id_customer, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	# get ID of invoice
	public function getID(): int {
		return $this->id_invoice;
	}

	# get customer by ID invoice from customers and invoices table
	public function getCustomerByInvoice(int $id_invoice) {
		$query = "select customers.* from invoices join customers on invoices.id_customer = customers.id_customer where invoices.id_invoice = :id_invoice";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->bindValue(':id_invoice', $id_invoice, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	# update status accept for invoices in invoices table
	public function agreeInvoice(int $id_invoice): bool {
		return parent::update($this->tableName, 'id_invoice', $id_invoice, ['status' => 1]);
	}

	# update status destroy for invoices in invoices table
	public function destroyInvoice(int $id_invoice): bool {
		return parent::update($this->tableName, 'id_invoice', $id_invoice, ['status' => -1]);
	}

	# count all items in invoices table
	public function countAll(): int {
		$query = "select count(*) from {$this->tableName}";

		$stmt = $this->getPDO()->prepare($query);
		$stmt->execute();

		return $stmt->fetchColumn();
	}

	# get items with offset and limit in invoices table
	public function paginate(int $offset = 0, int $limit = 10): array {
		$query = "select * from {$this->tableName} limit :offset, :limit";

		$stmt = $this->getPDO()->prepare($query);
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

	# count search result in invoices table
	public function countSearchResult(array $filters = []): int {
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
}