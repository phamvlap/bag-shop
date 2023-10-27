<?php

namespace App\Controllers\Customer;

use App\Controllers\Controller;
use App\Models\Customer;

class SigninController extends Controller {

	public function create() {
		if(isset($_SESSION['user']['id'])) {
			redirectTo('/');
		}
		else {
			renderPage('/customer/signin.php');
		}
	}

	public function store() {
		$keys = ['username', 'password'];
		$data = $this->filterData(keys: $keys, data: $_POST);
		$this->saveFormValues($data, ['password']);

		$customerModel = new Customer();

		$props = [
			'username' => $data['username']
		];

		$customersDB = $customerModel->findByProps($props);
		$isExist = false;
		$user = [];

		if(count($customersDB) > 0) {
			foreach($customersDB as $customerDB) {
				if(password_verify($data['password'], $customerDB['password'])){
					$isExist = true;
					$user = $customerDB;
					break;
				}
			}
		}

		if($isExist) {
			$message = 'Đăng nhập thành công.';
			redirectTo('/', ['user' => $user]);
		}
		else {
			$message = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
			renderPage('/customer/signin.php', ['failed' => $message]);
		}	
	}

	public function destroy() {
		session_unset();
		session_destroy();

		redirectTo('/');
	}
}