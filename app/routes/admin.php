<?php 

$router->get(
	'/admin',
	'App\Controllers\Admin\AdminController@index'
);
$router->get(
	'/admin/login',
	'App\Controllers\Admin\AdminController@create'
);
$router->post(
	'/admin/login',
	'App\Controllers\Admin\AdminController@store'
);
