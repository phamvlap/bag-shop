<?php

namespace App\Controller;

use App\Model\{ProductsModel, CustomersModel};
use App\Controller\BaseController;

class SearchController extends BaseController {
	private $productsModel, $customersModel;

	public function __construct() {
		$this->productsModel = new ProductsModel();
		$this->customersModel = new CustomersModel();
	}

	public function index() {
		$_SESSION['error-signin'] = false;
		$data['products'] = $this->productsModel->getAllProducts();
		$this->view('/../View/SearchView.php', data: $data);
	}
}