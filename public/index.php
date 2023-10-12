<?php

require_once __DIR__ . '/../bootstrap/bootstrap.php';

$pages = ['home', 'search', 'cart', 'detail', 'signin', 'signup'];

$uri = $_SERVER['REQUEST_URI'];

$pageName = explode('?', trim($uri, '/'))[0];

if(!in_array($pageName, $pages)) {
	$pageName = 'home';
}

$controller = ucfirst(strtolower($pageName)) . "Controller";

$controller = "App\\Controller\\{$controller}";
$page = new $controller();

$page->index();

?>
