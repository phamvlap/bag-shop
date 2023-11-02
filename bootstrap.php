<?php

use App\PDOFactory;

require_once __DIR__ . '/vendor/autoload.php';

session_start();

// autoload file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [ 
	'DB_HOST' => $_ENV['DB_HOST'],
	'DB_NAME' => $_ENV['DB_NAME'],
	'DB_USER' => $_ENV['DB_USER'],
	'DB_PASS' => $_ENV['DB_PASS']
];

$db = new PDOFactory(config: $config);

$pdo = $db->connect();
