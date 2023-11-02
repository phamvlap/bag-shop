<?php 

namespace App\Controllers;

use App\Models\{Invoice, Details, Product};

class CartController {

	public function index() {
		$isExistUser = true;
		if(!isset($_SESSION['user']['id_customer'])) {
			$isExistUser = false;
		}
		renderPage('/cart.php', ['is-exist-user' => $isExistUser]);
	}

	public function create() {
		$data = json_decode(file_get_contents('php://input'));

		if(!isset($_SESSION['user']['id_customer'])) {
			renderPage('/cart.php', ['is-exist-user' => false]);
		}
		else {
			$productModel = new Product();

			$rows = [];
			foreach($data->items as $item) {
				$row = $productModel->findByID($item->id_product);
				$row['count'] = $item->count;

				array_push($rows, $row);
			}
			setIntoSESSION([
				'total' => $data->total,
				'rows' => $rows
			]);
		}
	}

	public function showCheckout() {
		renderPage(page: '/checkout.php');
	}

	public function store() {
		$data = json_decode(file_get_contents('php://input'));
		$status = true;

		$content = [
			'status' => 0,
			'total' => $data->total
		];

		$invoice = new Invoice();

		$invoice->fill($content);
		$status = $invoice->add();

		$idInvoice = $invoice->getID();

		$details = [];
		$items = $data->items;
		foreach($items as $item) {
			array_push($details, [
				'id' => $item->id_product,
				'count' => $item->count
			]);
		}

		$detailsModel = new Details();

		$detailsModel->fill($idInvoice, $details);
		$status = $detailsModel->save();

		$message = '';
		if($status) {
			$message = 'Đặt hàng thành công';
		}
		else {
			$message = 'Thất bại trong việc đặt hàng. Vui lòng kiểm tra lại thông tin đặt hàng';
		}

		$_SESSION['status-order'] = $status;
		$_SESSION['message-order'] = $message;
	}
}