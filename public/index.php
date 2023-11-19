<?php

require_once __DIR__ . '/../bootstrap.php';

const APP_NAME = 'Bag Shop';
const MANAGEMENT_SYSTEM_NAME = 'Hệ thống quản lý cửa hàng Bag Shop';

$router = new \Bramus\Router\Router();

// routes of product
require_once __DIR__ . '/../app/routes/product.php';

// routes of customer
require_once __DIR__ . '/../app/routes/customer.php';

// routes of invoice
require_once __DIR__ . '/../app/routes/invoice.php';

// routes of cart
require_once __DIR__ . '/../app/routes/cart.php';

// routes of admin
require_once __DIR__ . '/../app/routes/admin.php';

// routes of manage products
require_once __DIR__ . '/../app/routes/manage_products.php';

// routes of manage invoices
require_once __DIR__ . '/../app/routes/manage_invoices.php';

// routes of error
require_once __DIR__ . '/../app/routes/error.php';

// routes of comments
require_once __DIR__ . '/../app/routes/comment.php';

// routes of home
require_once __DIR__ . '/../app/routes/home.php';

$router->run();
