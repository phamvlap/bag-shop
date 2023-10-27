<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requesteds-With');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Customer;

$customer = new Customer();

$user = [
	'name' => $_SESSION['user']['name'],
	'username' => $_SESSION['user']['username'],
	'password' => $_SESSION['user']['password'],
	'phone_number' => $_SESSION['user']['phone_number'],
	'gender' => $_SESSION['user']['gender'],
	'email' => $_SESSION['user']['email'],
	'address' => $_SESSION['user']['name']
];

if($customer->edit(id: $_SESSION['user']['id'], newInfo: $user)) {
	$_SESSION['update-user']['status'] = 'success';
	$_SESSION['update-user']['content'] = 'Cập nhật thông tin thành công';
}
else {
	$_SESSION['update-user']['status'] = 'failed';
	$_SESSION['update-user']['content'] = 'Cập nhật thông tin thất bại';
}