<?php

namespace App\Controllers;

use App\Models\{Product, Paginator, Comment};

class ProductsController {
	private int $numberOfItemsPerPage = 12;
	
	public function index() {
		purgeSESSION('search-input');

		$productModel = new Product();

		$type = (isset($_GET['type']) && is_numeric($_GET['type'])) ? (int)$_GET['type'] : false;
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;

		$orderPrice = '';

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : $this->numberOfItemsPerPage;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$totalRecords = 0;
		if(isset($type) && $type) {
			$totalRecords = $productModel->countByType(type: $type);
		}
		else {
			$totalRecords = $productModel->count();
		}

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $totalRecords, 
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

				$products = $productModel->paginateWithFilter(filters: ['type' => $type], orders: ['price' => $orderPrice], limit: $limit, offset: $paginator->getRecordOffset());
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
		$commentModel = new Comment();

		$item = $productModel->findByID($id);
		$comments = $commentModel->getNewestByItem($id);

		$payLoad = [
			...$item,
			'comments' => $comments
		];

		renderPage('/item.php', ['item' => $payLoad]);
	}

	public function getHint() {
		$data = json_decode(file_get_contents('php://input'));
		$searchValue = $data->searchValue;

		$productModel = new Product();
		$products = $productModel->search(name: $searchValue);

		echo json_encode($products);
	}

	public function search() {
		purgeSESSION('select-by-type');
		$productModel = new Product();

		$key = isset($_GET['key']) ? $_GET['key'] : '';
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;
		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : $this->numberOfItemsPerPage;

		$orderPrice = '';

		if(isset($requestOrder) && $requestOrder) {
			if($requestOrder === 'up') {
				$orderPrice = 'asc';
			}
			elseif($requestOrder === 'down') {
				$orderPrice = 'desc';
			}
		}

		$totalRecords = $productModel->countSearchResult(name: $key);

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $totalRecords, 
			currentPage: $page
		);

		$products = $productModel->paginateWithSearch(name: $key, orders: ['price' => $orderPrice], offset: $paginator->getRecordOffset(), limit: $limit);

		$pages = $paginator->getPages(length: min($paginator->getTotalPages(), 3));

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];

		renderPage('/home.php', [
				'search-input' => $key,
				'search-result-count' => $totalRecords,
				'products' => $products,
				'search-pagination' => $pagination
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