<?php

require_once __DIR__ . '/../../../bootstrap.php';

$data = json_decode(file_get_contents('php://input'));

$id = (int)$data->id;

$res = [];

if($id) {
	$query = 'select * from products where id_product = :id_product';
	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':id_product', $id);
	$stmt->execute();

	$res = $stmt->fetch(PDO::FETCH_ASSOC);
}

echo json_encode($res);
