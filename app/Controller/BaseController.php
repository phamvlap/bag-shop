<?php

namespace App\Controller;

abstract class BaseController {

	public abstract function index();

	public function view(string $pathView) {
		require __DIR__ . "$pathView";
	}
}