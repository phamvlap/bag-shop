<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methods: GET');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Customer;

$customer = new Customer();

$res = $customer->getAllCustomers();

echo json_encode($res);
