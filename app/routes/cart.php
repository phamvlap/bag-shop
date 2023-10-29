<?php

$router->get(
	'/cart',
	'App\Controllers\CartController@index'
);
$router->get(
	'/checkout/view',
	'App\Controllers\CartController@showCheckout'
);
$router->post(
	'/checkout/view',
	'App\Controllers\CartController@create'
);
$router->post(
	'/checkout/order',
	'App\Controllers\CartController@store'
);
