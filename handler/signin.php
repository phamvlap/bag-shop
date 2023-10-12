<?php

use App\Controller\SigninController;
use App\Model\Customer;

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../bootstrap/bootstrap.php';

if(isPostRequest()) {
	$props = [
		'username' => htmlspecialchars($_POST['username']) ?? '',
		'password' => htmlspecialchars($_POST['password']) ?? ''
	];
	$customer = new Customer();
	$currentUser = $customer->getCustomerByProps($props);
	if($currentUser) {
		$_SESSION['userid'] = $currentUser['id_customer'];
		$_SESSION['username'] = $currentUser['username'];
		$_SESSION['error-signin'] = false;
		redirectTo('/home');
	}
	else {
		$_SESSION['error-signin'] = true;
		$signController = new SigninController();
		$signController->index();
	}	
}
elseif(isGetRequest()) {
	redirectTo('/home');
}