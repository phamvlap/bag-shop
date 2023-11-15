<?php

namespace App\Controllers;

class HomeController {

	public function about() {
		renderPage('/about.php');
	}
}