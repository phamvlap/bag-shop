<?php

namespace App\Controllers;

class ErrorsController {

	# load 404 page
	public function notFound() {
		renderPage('/404.php');
	}
}