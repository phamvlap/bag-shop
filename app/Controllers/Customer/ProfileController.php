<?php

namespace App\Controllers\Customer;

use App\Controllers\Controller;
use App\Models\Customer;

class ProfileController extends Controller {
	# load profile user page
	public function edit() {
		renderPage('/customer/profile.php');
	}

	# update profile user
	public function update() {
		$keys = ['name', 'username', 'current-password', 'new-password', 'phone_number', 'gender', 'email', 'address'];
		$data = $this->filterData(keys: $keys, data: $_POST);

		$section = '';
		$text = '';

		if(isset($data['name'])) {
			$section = 'personal';
			$text = 'thông tin cá nhân';
		}
		elseif(isset($data['current-password'])) {
			$section = 'password';
			$text = 'mật khẩu';
		}
		elseif(isset($data['address'])) {
			$section = 'address';
			$text = 'thông tin liên hệ';
		}
		
		$customerModel = new Customer();

		$id = $_SESSION['user']['id_customer'];

		$customer = $customerModel->findByID(id: $id);

		$passwordHash = '';

		$respone = [];

		if(isset($data['current-password'])){
			if(!password_verify($data['current-password'], $customer['password'])) {
				$respone = [
					'status' => false,
					'message' => "Cập nhật $text thất bại! Vui lòng thử lại!"
				];
			}
			else {
					$passwordHash = password_hash($data['new-password'], PASSWORD_DEFAULT);
					$data['password'] = $passwordHash;
			}
			unset($data['current-password']);
			unset($data['new-password']);
		}

		if(count($data) > 0 && $customerModel->edit(id: $id, newInfo: $data)) {
			$_SESSION['user'] = $customerModel->findByID(id: $id);
			$respone = [
					'status' => true,
					'message' => "Cập nhật $text thành công"
				];
		}
		else {
			$respone = [
					'status' => false,
					'message' => "Cập nhật $text thất bại! Vui lòng thử lại!"
				];
		}

		redirectTo('/user/profile', ["status-$section" => $respone]);
	}
}