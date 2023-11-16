<?php 

$router->get(
	'/admin',
	'App\Controllers\Admin\AdminController@create'
);
$router->get(
	'/admin/product',
	'App\Controllers\Admin\AdminController@index'
);
$router->post(
	'/admin/login',
	'App\Controllers\Admin\AdminController@store'
);

$router->get(
	'/admin/destroy',
	'App\Controllers\Admin\AdminController@destroy'
);
