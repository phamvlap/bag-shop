<?php

function isPostRequest() {
	return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function isGetRequest() {
	return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

function isUserSignined() {
	return isset($_SESSION['userid']);
}

function redirectTo(string $url) {
	header('Location: ' . $url);
	exit;
}