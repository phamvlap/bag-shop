<?php

namespace App\Controllers;

use App\Models\Product;

class ProductsController {
	
	public function index() {
		purgeSESSION('search-input');

		$type = (isset($_GET['type']) && is_numeric($_GET['type'])) ? (int)$_GET['type'] : false;
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;

		$orderPrice = '';

		$product = new Product();

		if(isset($type) && $type !== false) {
			if(isset($requestOrder) && $requestOrder !== false) {
				if($requestOrder === 'up') {
					$orderPrice = 'asc';
				}
				elseif($requestOrder === 'down') {
					$orderPrice = 'desc';
				}

				$products = $product->getByTypeWithOrder(type: $type, orders: ['price' => $orderPrice]);
			}
			else {
				$products = $product->findByType(type: $type);
			}

			renderPage('/home.php', [
				'products' => $products,
				'select-by-type' => true
			]);
		}
		else {
			purgeSESSION('select-by-type');
			
			$products = $product->all();

			$newestProducts = $product->getNewestProducts();

			renderPage('/home.php', [
				'products' => $products,
				'newest-products' => $newestProducts
			]);
		}
	}

	public function viewItem(int $id) {
		$productModel = new Product();

		$item = $productModel->findByID($id);

		renderPage('/item.php', ['item' => $item]);
	}

	public function getHint() {
		$data = json_decode(file_get_contents('php://input'));
		$searchValue = $data->searchValue;

		$productModel = new Product();
		$products = $productModel->search(name: $searchValue);

		echo json_encode($products);
	}

	public function search() {
		$productModel = new Product();

		$key = isset($_GET['key']) ? $_GET['key'] : '';
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;

		$orderPrice = '';

		if(isset($requestOrder) && $requestOrder !== false) {
			if($requestOrder === 'up') {
				$orderPrice = 'asc';
			}
			elseif($requestOrder === 'down') {
				$orderPrice = 'desc';
			}
		}

		$products = $productModel->search(name: $key, orders: ['price' => $orderPrice]);
		
		renderPage('/home.php', [
			'search-input' => $key,
			'products' => $products
		]);
	}

	public function getItem() {
		$data = json_decode(file_get_contents('php://input'));

		$id = (int)$data->id;

		if($id) {
			$productModel = new Product();
			$item = $productModel->findByID($id);
		}

		echo json_encode($item);
	}
}