<?php

namespace App\Models;

use App\Models\{Model, Invoice, Product};

class Details extends Model {
	const TABLE_NAME = 'details';

	private $invoice, $products = [];

	public function __construct() {
		parent::__construct();
	}

	public function fill(int $idInvoice, array $items) {
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

	public function save() {
		foreach($this->products as $product) {
			$detail = [
				'id_invoice' => $this->invoice['id_invoice'],
				'id_product' => $product['id_product'],
				'count' => $product['count']
			];

			parent::set(self::TABLE_NAME, $detail);
		}
	}

	public function getListItem() {
		return $this->products;
	}

	public function getInvoice() {
		return $this->invoice;
	}
}