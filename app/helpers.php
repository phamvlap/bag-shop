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