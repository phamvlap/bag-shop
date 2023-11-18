<?php 

$router->get(
	'/admin/invoice',
	'App\Controllers\Admin\ManageInvoicesController@index'
);
$router->get(
	'/admin/invoice/view/(\d+)',
	'App\Controllers\Admin\ManageInvoicesController@viewInvoice'
);
$router->post(
	'/admin/invoice/update/(\d+)',
	'App\Controllers\Admin\ManageInvoicesController@store'
);
$router->get(
	'/admin/invoice/filter',
	'App\Controllers\Admin\ManageInvoicesController@filter'
);
