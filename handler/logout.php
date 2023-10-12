<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../bootstrap/bootstrap.php';

unset($_SESSION['userid']);
unset($_SESSION['username']);

session_destroy();

redirectTo('/home');


