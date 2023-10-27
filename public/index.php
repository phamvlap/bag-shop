<?php

use App\Models\Product;

require_once __DIR__ . '/../bootstrap.php';

define('VIEWS_DIR', __DIR__ . '/../app/views');
const PUBLIC_DIR = '../../../..';
const DOMAIN_NAME = 'http://goodstore.localhost';
const APP_NAME = 'Bag Shop';

$router = new \Bramus\Router\Router();

// product
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

// customer
$router->get(
	'/user/register',
	'App\Controllers\Customer\RegisterController@create'
);
$router->post(
	'/user/register',
	'App\Controllers\Customer\RegisterController@store'
);
$router->get(
	'/user/signin',
	'App\Controllers\Customer\SigninController@create'
);
$router->post(
	'/user/signin',
	'App\Controllers\Customer\SigninController@store'
);
$router->get(
	'/user/profile',
	'App\Controllers\Customer\ProfileController@edit'
);
$router->post(
	'/user/profile',
	'App\Controllers\Customer\ProfileController@update'
);
$router->get(
	'/user/logout',
	'App\Controllers\Customer\SigninController@destroy'
);

// cart
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

$router->run();