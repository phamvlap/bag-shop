<?php

namespace App\Controller;

use App\Controller\BaseController;

class ContactController extends BaseController {

	public function index() {
		$this->view('/../View/ContactView.php');
	}
}