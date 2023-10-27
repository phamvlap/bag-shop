<?php

namespace App\Controller;

use App\Model\Product;
use App\Controller\BaseController;

class DetailController extends BaseController {
	private $product;

	public function __construct() {
		$this->product = new Product();
	}

	public function getProductsModel() {
		return $this->product;
	}

	public function index() {
		$this->view('/../View/DetailItemView.php');
	}
}