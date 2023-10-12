<?php

namespace App\Controller;

use App\Model\Customer;
use App\Controller\BaseController;

class SignupController extends BaseController {
	private $customer;

	public function __construct() {
		$this->customer = new Customer();
	}

	public function getCustomersModel() {
		return $this->customersModel;
	}

	public function index() {
		$_SESSION['error-signin'] = false;
		$this->view('/../View/SignupView.php');
	}
}