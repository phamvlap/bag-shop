<?php $htmlspecialchars = 'htmlspecialchars'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php
			$uri = $_SERVER['REQUEST_URI'];
			echo (strpos($uri, '/admin') !== false) ? $htmlspecialchars(MANAGEMENT_SYSTEM_NAME) : $htmlspecialchars(APP_NAME);
		?>
	</title>

	<!-- library files -->
	<link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/libs/fontawesome/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="/libs/fontawesome/css/solid.css">
	<link rel="stylesheet" type="text/css" href="/libs/fontawesome/css/brands.css">
	<link rel="stylesheet" type="text/css" href="/libs/fontawesome/css/regular.css">

	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/admin.css">
</head>
<body>
