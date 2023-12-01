<?php

namespace App\Controllers;

use App\Models\{Product, Paginator, Comment};

class ProductsController {
	private int $numberOfItemsPerPage = 12;
	
	# load home page of website
	public function index() {
		$productModel = new Product();

		$type = (isset($_GET['type'])) ? (int)$_GET['type'] : false;
		$requestOrder = (isset($_GET['price'])) ? $_GET['price'] : false;

		$orderPrice = '';

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : $this->numberOfItemsPerPage;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$totalRecords = 0;
		if(isset($type) && $type !== false) {
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

			renderPage('/home/index.php', [
				'products' => $products,
				'pagination' => $pagination
			]);
		}
		else {
			$products = $productModel->paginate(offset: $paginator->getRecordOffset(), limit: $paginator->getRecordsPerPage());

			$newestProducts = $productModel->getNewestProducts();

			renderPage('/home/index.php', [
				'products' => $products,
				'newest-products' => $newestProducts,
				'pagination' => $pagination
			]);
		}
	}

	# show details of item
	public function viewItem(int $id) {
		$productModel = new Product();
		$commentModel = new Comment();

		$item = $productModel->findByID($id);
		$comments = $commentModel->getNewestByItem($id);

		$payLoad = [
			...$item,
			'comments' => $comments
		];

		renderPage('/detail_item/index.php', ['item' => $payLoad]);
	}

	# get hint for search key
	public function getHint() {
		$data = json_decode(file_get_contents('php://input'));
		$searchValue = $data->searchValue;

		$productModel = new Product();
		$products = $productModel->search(name: $searchValue);

		echo json_encode($products);
	}

	# search items by key
	public function search() {
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

		renderPage('/home/index.php', [
				'search-result-count' => $totalRecords,
				'products' => $products,
				'pagination' => $pagination
			]);
	}

	# get info item from products table
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