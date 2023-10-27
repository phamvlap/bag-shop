<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requesteds-With');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Customer;

$customer = new Customer();

$customer->fill($_POST);
$customer->add();
