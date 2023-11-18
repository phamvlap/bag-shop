<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\{Invoice, Details, Paginator};

class ManageInvoicesController extends Controller {

	public function index() {
		if(!isset($_SESSION['admin'])) {
			redirectTo('/admin');
		}
		$invoiceModel = new Invoice();

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : 10;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;


		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $invoiceModel->countAll(), 
			currentPage: $page
		);

		$invoices = $invoiceModel->paginate(offset: $paginator->getRecordOffset(), limit: $limit);
		$pages = $paginator->getPages();

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];

		renderPage('/admin/invoices.php', [
			'invoices' => $invoices,
			'invoices-pagination' => $pagination
		]);
	}

	public function viewInvoice(int $id) {
		$invoiceModel = new Invoice();

		$invoice = $invoiceModel->findByID(id_invoice: $id);

		$customer = $invoiceModel->getCustomerByInvoice(id_invoice: $id);

		$detailModel = new Details();

		$listItems = $detailModel->getListItemsFromDB(id_invoice: $id);
		$invoice['customer'] = $customer;
		$invoice['items'] = $listItems;

		renderPage('/admin/detail_invoice.php', ['invoice' => $invoice]);
	}

	public function store(int $id) {
		$invoiceModel = new Invoice();

		$isSuccess = $invoiceModel->agreeInvoice(id_invoice: $id);

		if($isSuccess) {
			redirectTo('/admin/invoice/view/' . $id);
		}
	}

	public function filter() {
		purgeSESSION('invoices-pagination');

		$keys = ['filter-invoice-date', 'filter-invoice-total', 'filter-invoice-status'];
		$data = $this->filterData(keys: $keys, data: $_GET);

		$filters = [];
		$orders = [];

		if(isset($data['filter-invoice-date']) && $data['filter-invoice-date'] !== 'none') {
			$orders['created_at'] = $data['filter-invoice-date'];
		}
		if(isset($data['filter-invoice-total']) && $data['filter-invoice-total'] !== 'none') {
			$orders['total'] = $data['filter-invoice-total'];
		}
		if(isset($data['filter-invoice-status']) && $data['filter-invoice-status'] !== 'none') {
			$filters['status'] = $data['filter-invoice-status'];
		}

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : 10;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$invoiceModel = new Invoice();

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $invoiceModel->countSearchResult(filters: $filters), 
			currentPage: $page
		);

		if(count($filters) === 0 && count($orders) === 0) {
			$invoices = $invoiceModel->paginate(offset: $paginator->getRecordOffset(), limit: $limit);
		}
		else {
			$invoices = $invoiceModel->paginateWithFilter(filters: $filters, orders: $orders, offset: $paginator->getRecordOffset(), limit: $limit);
		}

		$pages = $paginator->getPages();

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];

		renderPage('/admin/invoices.php', [
			'invoices' => $invoices,
			'filter-invoices-pagination' => $pagination
		]);
	}

	public function showFilter() {
		purgeSESSION('invoices-pagination');

		$keys = ['created_at', 'total', 'status'];
		$data = $this->filterData(keys: $keys, data: $_GET);

		$orders = [];
		if(isset($data['created_at'])) {
			$orders['created_at'] = $data['created_at'];
		}
		if(isset($data['total'])) {
			$orders['total'] = $data['total'];
		}

		$filters = [];
		if(isset($data['status'])) {
			$filters['status'] = $data['status'];
		}

		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : 10;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$invoiceModel = new Invoice();

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: $_SESSION['total-invoices'], 
			currentPage: $page
		);

		if(count($filters) === 0 && count($orders) === 0) {
			$invoices = $invoiceModel->paginate(offset: 0, limit: $limit);
		}
		else {
			$invoices = $invoiceModel->paginateWithFilter(filters: $filters, orders: $orders, offset: $paginator->getRecordOffset(), limit: $limit);
		}

		$pages = $paginator->getPages();

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];
		
		renderPage('/admin/invoices.php', [
			'total-invoices' => $paginator->getTotalRecords(),
			'request-filters' => [...$filters, ...$orders],
			'invoices' => $invoices,
			'filter-invoices-pagination' => $pagination
		]);
	}
}