<?php

namespace App\Controllers;

class ErrorsController {

	public function notFound() {
		renderPage('/404.php');
	}
}