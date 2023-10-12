<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methos: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requesteds-With');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Product;

$product = new Product();

$idProduct = isset($_GET['id']) ? $_GET['id'] : null;

if($idProduct) {
	$product->deleteProduct($idProduct);
}
