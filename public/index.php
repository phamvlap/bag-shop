<?php

use App\Models\Product;

require_once __DIR__ . '/../bootstrap.php';

const VIEWS_DIR = __DIR__ . '/../app/views';
const DOMAIN_NAME = 'http://bagshop.localhost';
const APP_NAME = 'Bag Shop';

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

// routes of error
require_once __DIR__ . '/../app/routes/error.php';

// routes of comments
require_once __DIR__ . '/../app/routes/comment.php';

// routes of home
require_once __DIR__ . '/../app/routes/home.php';

$router->run();
