<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methos: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requesteds-With');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Customer;

$customer = new Customer();

$data = json_decode(file_get_contents("php://input"));

$id_customer = $data->id_customer;
$name = $data->name;
$username = $data->username;
$password = $data->password;
$avatar = $data->avatar;
$phone_number = $data->phone_number;
$gender = $data->gender;
$email = $data->email;
$address = $data->address;

$newInfo = [
			'id_customer' => $id_customer,
			'name' => htmlspecialchars($name),
			'username' => htmlspecialchars($username),
			'password' => htmlspecialchars($password),
			'avatar' => htmlspecialchars($avatar),
			'phone_number' => htmlspecialchars($phone_number),
			'gender' => htmlspecialchars($gender),
			'email' => htmlspecialchars($email),
			'address' => htmlspecialchars($address)
		];

$customer->updateProfileCustomer(id: $id_customer, newInfo: $newInfo);