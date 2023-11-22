<?php

namespace App\Controllers\Customer;

use App\Controllers\Controller;
use App\Models\Customer;

class RegisterController extends Controller {

	# load register page
	public function create() {
		if($_SESSION['user']['id_customer']) {
			redirectTo('/');
		}
		else {
			renderPage('/customer/register.php');
		}
	}

	# store info user
	public function store() {
		$keys = ['name', 'username', 'phone_number', 'password'];
		$data = $this->filterData(keys: $keys, data: $_POST);
		$this->saveFormValues($data, ['password']);

		$props = [
			'username' => $data['username']
		];
		
		$customerModel = new Customer();
		
		$customersDB = $customerModel->findByProps($props);
		$isExist = false;

		if(count($customersDB) > 0) {
			foreach($customersDB as $customerDB) {
				if(password_verify($data['password'], $customerDB['password'])){
					$isExist = true;
					break;
				}
			}
		}

		if($isExist) {
			$message = 'Tài khoản đăng ký đã tồn tại.';
			renderPage('/customer/register.php', [
				'old' => $this->getSavedFormValues(),
				'failed' => $message
			]);
		}
		else {
			$customerModel->fill($data);
			$customerModel->add();
			$message = 'Đăng ký tài khoản thành công.';
			renderPage('/customer/register.php', [
				'new' => $data,
				'success' => $message
			]);
		}
	}
}