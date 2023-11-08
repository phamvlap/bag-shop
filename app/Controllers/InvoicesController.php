<?php

namespace App\Controllers;

use App\Models\{Invoice, Details};

class InvoicesController {

	public function index() {
		$invoiceModel = new Invoice();
		$detailsModel = new Details();

		$invoicesList = $invoiceModel->findByIDCustomer(id_customer: $_SESSION['user']['id_customer']);

		$invoices = [];

		foreach($invoicesList as $invoiceForm) {
			$details = $detailsModel->getListItemsFromDB(id_invoice: $invoiceForm['id_invoice']);

			array_push($invoices, [
				...$invoiceForm, 
				'details' => $details
			]);
		}

		renderPage('/history_order.php', ['invoices' => $invoices]);
	}

	public function detailOrder(int $id) {
		$invoiceModel = new Invoice();
		$detailsModel = new Details();

		$invoice = $invoiceModel->findByID(id_invoice: $id);

		$details = $detailsModel->getListItemsFromDB(id_invoice: $id);

		$invoice['details'] = $details;

		renderPage('/detail_order.php', ['invoice' => $invoice]);
	}
}