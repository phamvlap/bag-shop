<?php

namespace App\Controller;

use App\Controller\BaseController;

class HistoryPurchaseController extends BaseController {

	public function index() {
		$this->view('/../View/HistoryPurchaseView.php');
	}
}