<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\{
	HomeController, 
	SearchController, 
	SigninController, 
	SignupController,
	DetailController,
	CartController
};

use App\Model\{Customer, Product};

$_SESSION['error-signin'] = false;
