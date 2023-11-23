<?php

$router->post(
	'/comment/add',
	'App\Controllers\CommentsController@store'
);
$router->post(
	'/comment/like',
	'App\Controllers\CommentsController@likeComment'
);
