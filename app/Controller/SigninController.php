<?php

namespace App\Controller;

use App\Model\Customer;
use App\Controller\BaseController;

class SigninController extends BaseController {
	private $customer;

	public function __construct() {
		$this->customer = new Customer();
	}

	public function getCustomersModel() {
		return $this->customersModel;
	}

	public function index($params = '') {
		$this->view('/../View/SigninView.php');
	}
}