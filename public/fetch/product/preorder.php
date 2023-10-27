<?php

require_once __DIR__ . '/../../../bootstrap.php';

$data = json_decode(file_get_contents('php://input'));

// $_POST['preorder'] = $data;

redirectTo('/checkout');

// $_SERVER['REQUEST_METHOD'] = 'POST';

// echo json_encode($data);