<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methods: GET');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Product;

$product = new Product();

$idProduct = isset($_GET['id']) ? $_GET['id'] : 0;

$res = $product->getProductByID($idProduct);

echo json_encode($res);
