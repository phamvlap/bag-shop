<?php

namespace App\Models;

use App\Models\{Model, Invoice, Product};
use PDO;

class Details extends Model {
	private string $tableName = 'details'; # name of table

	private $invoice, $products = [];

	public function __construct() {
		parent::__construct();
	}

	# fill data for attributes of detail from external data
	public function fill(int $idInvoice, array $items): void {
		$invoiceModel = new Invoice();
		$this->invoice = $invoiceModel->findByID($idInvoice);

		$productModel = new Product();
		foreach($items as $item) {
			$product = $productModel->findByID($item['id']);

			if($product) {
				array_push($this->products, [
					...$product,
					'count' => $item['count']
				]);
			}
		}
	}

	# save details into details table
	public function save(): bool {
		$res = true;
		foreach($this->products as $product) {
			$detail = [
				'id_invoice' => $this->invoice['id_invoice'],
				'id_product' => $product['id_product'],
				'count' => $product['count']
			];

			$res = parent::set($this->tableName, $detail);
			if($res === false) {
				break;
			}
		}
		return $res;
	}

	# get all items
	public function getListItem(): array {
		return $this->products;
	}

	# get invoice
	public function getInvoice(): array {
		return $this->invoice;
	}

	# get all items of an invoice from database
	public function getListItemsFromDB(int $id_invoice): array {
		$query = "select products.*, details.count from details join products on details.id_product = products.id_product where details.id_invoice = :id_invoice";

		$stmt = $this->getPDO()->prepare($query);	
		$stmt->bindValue(':id_invoice', $id_invoice, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}