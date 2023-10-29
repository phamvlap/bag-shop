<?php 

$router->get(
	'/',
	'App\Controllers\ProductsController@index'
);
$router->get(
	'/home',
	'App\Controllers\ProductsController@index'
);
$router->get(
	'/view/item/(\d+)',
	'App\Controllers\ProductsController@viewItem'
);
