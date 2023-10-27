<?php

namespace App\Controller;

use App\Controller\BaseController;

class SearchController extends BaseController {

	public function index() {
		$this->view('/../View/SearchView.php');
	}
}