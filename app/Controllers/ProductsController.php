<?php

namespace App\Controllers;

use App\Models\{Product, Paginator};

class ProductsController {
	
	public function index() {
		purgeSESSION('search-input');

		$productModel = new Product();

		$type = (isset($_GET['type']) && is_numeric($_GET['type'])) ? (int)$_GET['type'] : false;
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;

		$orderPrice = '';

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : 12;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$totalPages = 0;
		if(isset($type) && $type) {
			$totalPages = $productModel->countByType(type: $type);
		}
		else {
			$totalPages = $productModel->count();
		}

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $totalPages, 
			currentPage: $page
		);

		$pages = $paginator->getPages(length: min($paginator->getTotalPages(), 3));

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];

		if(isset($type) && $type !== false) {
			if(isset($requestOrder) && $requestOrder !== false) {
				if($requestOrder === 'up') {
					$orderPrice = 'asc';
				}
				elseif($requestOrder === 'down') {
					$orderPrice = 'desc';
				}

				$products = $productModel->paginateWithTypeAndOrder(type: $type, offset: $paginator->getRecordOffset(), limit: $limit, orders: ['price' => $orderPrice]);
			}
			else {
				$products = $productModel->paginateWithType(type: $type, offset: $paginator->getRecordOffset(), limit: $limit);
			}

			renderPage('/home.php', [
				'products' => $products,
				'select-by-type' => true,
				'type' => $type,
				'price' => $orderPrice,
				'home-pagination' => $pagination
			]);
		}
		else {
			purgeSESSION('select-by-type');
			
			$products = $productModel->paginate(offset: $paginator->getRecordOffset(), limit: $paginator->getRecordsPerPage());

			$newestProducts = $productModel->getNewestProducts();

			renderPage('/home.php', [
				'products' => $products,
				'newest-products' => $newestProducts,
				'home-pagination' => $pagination
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