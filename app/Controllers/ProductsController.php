<?php

namespace App\Controllers;

use App\Models\Product;

class ProductsController {
	
	public function index() {
		$product = new Product();
		$products = $product->all();

		renderPage('/home.php', ['products' => $products]);
	}

	public function viewItem(int $id) {
		$productModel = new Product();

		$item = $productModel->findByID($id);

		renderPage('/item.php', ['item' => $item]);
	}
}