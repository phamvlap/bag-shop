<?php

$router->post(
	'/comment/add',
	'App\Controllers\CommentsController@store'
);
