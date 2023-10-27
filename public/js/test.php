<?php
$data = json_decode(file_get_contents("php://input"), true);

echo "<pre>";
echo $_POST['name'];
echo $_POST['city'];
print_r($_POST['user']);
echo "</pre>";
