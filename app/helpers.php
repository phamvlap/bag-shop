<?php

function redirectTo(string $url, array $data = []) {
	setIntoSESSION($data);
	
	header('Location: ' . $url);
	exit;
}

function renderPage(string $page, array $data = []) {
	setIntoSESSION($data);

	require_once __DIR__ . '/views' . $page;
}

function getOnceSession(string $name, $default = null) {
	$value = $default;

	if(isset($_SESSION[$name])) {
		$value = $_SESSION[$name];
		unset($_SESSION[$name]);
	}

	return $value;
}

function setIntoSESSION(array $data): void {
	foreach($data as $key => $value) {
		$_SESSION[$key] = $value;
	}
}

function purgeSESSION(string $key) {
	if(isset($_SESSION[$key])) {
		unset($_SESSION[$key]);
	}
}

function retrieveDay(int $day) {
	$res = '';

	switch($day) {
		case 0: 
			$res = 'Chủ nhật';
			break;
		case 1: 
			$res = 'Thứ hai';
			break;
		case 2: 
			$res = 'Thứ ba';
			break;
		case 3: 
			$res = 'Thứ tư';
			break;
		case 4: 
			$res = 'Thứ năm';
			break;
		case 5: 
			$res = 'Thứ sáu';
			break;
		case 6: 
			$res = 'Thứ bảy';
			break;
	}
	return $res;
}