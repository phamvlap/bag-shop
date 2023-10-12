<?php

namespace App\Controller;

use App\Model\{Product, Customer};
use App\Controller\BaseController;

class HomeController extends BaseController {
	private $product, $customer;

	public function __construct() {
		$this->product = new Product();
		$this->customer = new Customer();
	}

	public function index() {
		$this->view('/../View/HomeView.php');
	}
}