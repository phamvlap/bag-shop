<?php

$router->get(
	'/user/history-order',
	'App\Controllers\InvoicesController@index'
);
$router->get(
	'/user/history-order/detail/(\d+)',
	'App\Controllers\InvoicesController@detailOrder'
);
$router->get(
	'/user/history-order/destroy/(\d+)',
	'App\Controllers\InvoicesController@destroy'
);
