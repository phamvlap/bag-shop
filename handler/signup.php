<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../bootstrap/bootstrap.php';

if(isUserSignined()) {
	redirectTo('/home');
}

if(isPostRequest()) {
	require_once __DIR__ . '/../api/customer/insert.php';
	redirectTo('/home');
}
elseif(isGetRequest()) {
	redirectTo('/home');
}
