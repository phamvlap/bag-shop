<?php

namespace App\Controllers;

class HomeController {
	# load about page
	public function about() {
		renderPage('/about.php');
	}
}