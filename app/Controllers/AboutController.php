<?php

namespace App\Controller;

use App\Controller\BaseController;

class AboutController extends BaseController {

	public function index() {
		$this->view('/../View/AboutView.php');
	}
}