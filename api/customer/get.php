<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methods: GET');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Customer;

$customer = new Customer();

$idCustomer = isset($_GET['id']) ? $_GET['id'] : null;

$res = $customer->findByID($idCustomer);

echo json_encode($res);
