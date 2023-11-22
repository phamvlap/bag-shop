<?php

namespace App\Controllers;

use App\Models\{Invoice, Details};

class InvoicesController {

	# show history orders of user
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

	# show details of order
	public function detailOrder(int $id) {
		$invoiceModel = new Invoice();
		$detailsModel = new Details();

		$invoice = $invoiceModel->findByID(id_invoice: $id);

		$details = $detailsModel->getListItemsFromDB(id_invoice: $id);

		$invoice['details'] = $details;

		renderPage('/detail_order.php', ['invoice' => $invoice]);
	}

	# remove order by user
	public function destroy(int $id) {
		$invoiceModel = new Invoice();

		if($invoiceModel->destroyInvoice($id)) {
			$message = "Hủy đơn hàng #{$id} thành công";
			redirectTo('/user/history-order', ['success-order-destroy' => $message]);
		}
		else {
			$message = "Thất bại trong việc hủy đơn hàng #{$id} ";
			redirectTo('/user/history-order', ['failed-order-destroy' => $message]);
		}
	}
}