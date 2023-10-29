<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Product;

class AdminController extends Controller {

	public function index() {
		$productModel = new Product();
		$products = $productModel->all();

		renderPage('/admin/index.php', [
			'products' => $products
		]);
	}

	public function create() {
		renderPage('/admin/login.php');
	}

	public function store() {
		$keys = ['admin-email', 'admin-password'];

		$data = $this->filterData(keys: $keys, data: $_POST);

		$this->saveFormValues(data: $data, except: ['admin-password']);

		$errors = [];

		if($data['admin-email'] === '') {
			$errors['admin-email'] = 'Email không được bỏ trống';
		}
		elseif($data['admin-email'] !== 'admin@gmail.com') {
			$errors['admin-email'] = 'Email không chính xác';
		}

		if($data['admin-password'] === '') {
			$errors['admin-password'] = 'Mật khẩu không được bỏ trống';
		}
		elseif($data['admin-password'] !== 'admin123') {
			$errors['admin-password'] = 'Mật khẩu không chính xác';
		}

		if(count($errors) > 0) {
			renderPage('/admin/login.php', ['admin-errors' => $errors]);
		}

		redirectTo('/admin');
	}
}