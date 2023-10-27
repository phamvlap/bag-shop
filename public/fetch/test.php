<?php

$data = json_decode(file_get_contents('php://input'));

echo "<pre>";
// print_r(gettype($data));
echo $data->name;
echo $data->city;
// print_r($_POST['user']);
echo "</pre>";
