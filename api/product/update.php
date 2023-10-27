<?php

header('Acess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acess-Control-Allow-Methos: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requesteds-With');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Product;

$product = new Product();

$data = json_decode(file_get_contents("php://input"));

$id_product = $data->id_product;
$name = $data->name;
$describes = $data->describes;
$images = $data->images;
$type_product = $data->type_product;
$unit = $data->unit;
$price = $data->price;

$newProduct = [
			'name' => $name, 
			'describes' => $describes,
			'images' => $images, 
			'type_product' => $type_product, 
			'unit' => $unit, 
			'price' => $price
		];

$product->edit(id: $id_product, newProduct: $newProduct);