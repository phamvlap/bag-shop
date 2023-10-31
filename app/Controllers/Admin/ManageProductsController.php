<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\{Product, Paginator};

class ManageProductsController extends Controller {
	public function create() {
		renderPage('/admin/product/add.php');
	}

	public function store() {
		$keys = ['item-name', 'item-desc', 'item-price', 'item-type'];
		$data = $this->filterData(keys: $keys, data: $_POST);
		$data['item-files'] = $_FILES['item-files'];

		$this->saveFormValues(data: $data);

		$resCheckValues = $this->checkValuesForm($data);

		$errors = $resCheckValues['errors'];
		$newImages = $resCheckValues['new-images'];

		if(count($errors) > 0) {
			renderPage('/admin/product/add.php', [
				'old' => $this->getSavedFormValues(),
				'errors' => $errors
			]);
		}
		else {
			$saveImages = join(';', $newImages);
			$product = new Product();
			$fillableData = [
				'name' => $data['item-name'],
				'describes' => $data['item-desc'],
				'images' => $saveImages,
				'type' => $data['item-type'],
				'price' => $data['item-price']
			];

			$product->fill($fillableData);

			if($product->add()) {
				redirectTo('/admin', [
					'message-success' => "{$data['item-name']} đã được thêm thành công"
				]);
			}
			else {
				redirectTo('/admin', [
					'message-failed' => "Thêm sản phẩm {$data['item-name']} thất bại!"
				]);
			}
		}
	}

	public function edit(int $id) {
		$product = new Product();
		$item = $product->findByID(id: $id);

		renderPage('/admin/product/edit.php', [
			'item' => $item
		]);
	}

	public function update(int $id) {
		$productModel = new Product();
		$item = $productModel->findByID(id: $id);

		$keys = ['item-name', 'item-desc', 'item-price', 'item-type'];
		$data = $this->filterData(keys: $keys, data: $_POST);
		if(isset($_FILES['item-files']) && strlen($_FILES['item-files']['name'][0])> 0) {
			$data['item-files'] = $_FILES['item-files'];
		}

		$this->saveFormValues(data: $data);

		$resCheckValues = $this->checkValuesForm($data);

		$errors = $resCheckValues['errors'];
		$newImages = $resCheckValues['new-images'];

		if(!isset($data['item-files']) && strlen($item['images']) > 0) {
			unset($errors['item-files']);
		}

		if(count($errors) > 0) {
			renderPage('/admin/product/edit.php', [
				'old' => $this->getSavedFormValues(),
				'errors' => $errors
			]);
		}
		else {
			$saveImages = join(';', $newImages);

			$updatedFields = [];

			if($item['name'] !== $data['item-name']) {
				echo "name";
				$updatedFields['name'] = $data['item-name'];
			}
			if($item['describes'] !== $data['item-desc']) {
				$updatedFields['describes'] = $data['item-desc'];
			}
			if(isset($data['item-files']) && $item['images'] !== $saveImages) {
				$updatedFields['images'] = $saveImages;
			}
			if($item['type'] !== (int)$data['item-type']) {
				$updatedFields['type'] = $data['item-type'];
			}
			if($item['price'] !== (int)$data['item-price']) {
				$updatedFields['price'] = $data['item-price'];
			}

			if(count($updatedFields) > 0) {
				if($productModel->edit(id: $id, updatedFields: $updatedFields)) {
					redirectTo('/admin', [
						'message-success' => "{$item['name']} đã được cập nhật thành công"
					]);
				}
				else {
					redirectTo('/admin', [
						'message-failed' => "Cập nhật sản phẩm {$item['name']} thất bại!"
					]);
				}
			}
			else {
				redirectTo('/admin', [
					'message-success' => "Không có thay đổi nào trong sản phẩm {$item['name']}"
				]);
			}	
		}		
	}

	public function confirmDelete(int $id) {
		$productModel = new Product();
		$item = $productModel->findByID(id: $id);

		if($item) {
			renderPage('/admin/index.php', [
				'delete-item' => $item
			]);
		}
	}

	public function destroy(int $id) {
		$productModel = new Product();
		$item = $productModel->findByID(id: $id);

		if($productModel->remove(id: $id)) {
			redirectTo('/admin', [
				'message-success' => "Xóa sản phẩm {$item['name']} thành công"
			]);
		}
		else {
			redirectTo('/admin', [
				'message-failed' => "Thất bại khi Xóa sản phẩm {$item['name']}"
			]);
		}
	}

	public function checkValuesForm(array $data) {
		$errors = [];

		if(strlen($data['item-name']) === 0) {
			$errors['item-name'] = 'Tên sản phẩm không được bỏ trống';
		}

		if(strlen($data['item-desc']) === 0) {
			$errors['item-desc'] = 'Mô tả sản phẩm không được bỏ trống';
		}

		if(strlen($data['item-price']) === 0) {
			$errors['item-price'] = 'Giá sản phẩm không được bỏ trống';
		}

		if((int)$data['item-type'] === 0) {
			$errors['item-type'] = 'Loại sản phẩm không được bỏ trống';
		}

		// upload images
		$targetDir = __DIR__ . '/../../../public/uploads/';
		$extensions = ['jpg', 'jpeg', 'png', 'gif'];
		$newImages = [];

		if(isset($data['item-files']) && strlen($data['item-files']['name'][0]) > 0) {
			for($i = 0; $i < count($data['item-files']['name']); ++$i) {
				$imageFileName = $data['item-files']['name'][$i];
				$checkImageSize = getimagesize($data['item-files']['tmp_name'][$i]);
				$imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));

				// check file image
				if($checkImageSize === false) {
					$errors['item-files'] = "{$imageFileName} không phải là hình ảnh!";
					break;
				}

				// check size image
				if($data['item-files']['size'][$i] > 500000) {
					$errors['item-files'] = "{$imageFileName} có kích thước quá lớn!";
					break;
				}

				// check allowed extensions
				if(!in_array($imageFileType, $extensions)) {
					$errors['item-files'] = "{$imageFileName} không thuộc định dạng hình ảnh cho phép! Chỉ hình ảnh JPG, JPEG, PNG, GIF là được cho phép tải lên";
					break;
				}

				// save image to new destination
				if(!isset($errors['item-files'])) {
					$newImageName = bin2hex(random_bytes(4));

					$targetFile = $targetDir . $newImageName . ".{$imageFileType}";

					if(move_uploaded_file($data['item-files']['tmp_name'][$i], $targetFile)) {
						array_push($newImages, $newImageName . ".{$imageFileType}");
					}
					else {
						$errors['item-files'] = "{$imageFileName} có lỗi trong quá trình tải lên";
					}
				}
				else {
					break;
				}
			}
		}
		else {
			$errors['item-files'] = "Không tìm thấy hình ảnh tải lên!";
		}

		return [
			'errors' => $errors,
			'new-images' => $newImages
		];
	}

	public function showFilter() {
		$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? (int)$_GET['limit'] : 5;
		$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

		$paginator = new Paginator(
			recordsPerPage: $limit, 
			totalRecords: count($_SESSION['filter-data']), 
			currentPage: $page
		);

		$recordOffset = $paginator->getRecordOffset();

		$renderData = [];
		for($i = $recordOffset; $i < min(count($_SESSION['filter-data']), $recordOffset + $limit); ++$i) {
			array_push($renderData, $_SESSION['filter-data'][$i]);
		}

		$pages = $paginator->getPages();

		$pagination = [
			'limit' => $limit,
			'prevPage' => $paginator->getPrevPage(),
			'currPage' => $paginator->getCurrPage(),
			'nextPage' => $paginator->getNextPage(),
			'pages' => $pages
		];

		renderPage('/admin/index.php', [
			'products' => $renderData,
			'filter-pagination' => $pagination
		]);
	}

	public function filter() {
		$keys = ['filter-type', 'filter-price', 'filter-date'];
		$data = $this->filterData(keys: $keys, data: $_POST);

		$productModel = new Product();

		if($data['filter-type'] === 'none' && $data['filter-price'] === 'none' && $data['filter-date'] === 'none') {
			redirectTo('/admin', [
				'message-success' => 'Không có bộ lọc nào được chọn'
			]);
		}
		else {
			if($data['filter-type'] !== 'none' && $data['filter-price'] === 'none' && $data['filter-date'] === 'none') {
				$type = (int)$data['filter-type'];

				$products = $productModel->findByType(type: $type);
			}
			if($data['filter-type'] === 'none' && $data['filter-price'] !== 'none' && $data['filter-date'] === 'none') {
				$products = $productModel->getWithOrder(orders: ['price' => $data['filter-price']]);
			}
			if($data['filter-type'] === 'none' && $data['filter-price'] === 'none' && $data['filter-date'] !== 'none') {
				$products = $productModel->getWithOrder(orders: ['updated_at' => $data['filter-date']]);
			}
			if($data['filter-type'] !== 'none' && $data['filter-price'] !== 'none' && $data['filter-date'] === 'none') {
				$products = $productModel->getByTypeWithOrder(
					type: (int)$data['filter-type'], 
					orders: ['price' => $data['filter-price']]
				);
			}
			if($data['filter-type'] !== 'none' && $data['filter-price'] === 'none' && $data['filter-date'] !== 'none') {
				$products = $productModel->getByTypeWithOrder(
					type: (int)$data['filter-type'], 
					orders: ['updated_at' => $data['filter-date']]
				);
			}
			if($data['filter-type'] === 'none' && $data['filter-price'] !== 'none' && $data['filter-date'] !== 'none') {
				$products = $productModel->getWithOrder(orders: [
					'price' => $data['filter-price'],
					'updated_at' => $data['filter-date']
				]);
			}
			if($data['filter-type'] !== 'none' && $data['filter-price'] !== 'none' && $data['filter-date'] !== 'none') {
				$products = $productModel->getByTypeWithOrder(
					type: (int)$data['filter-type'],  
					orders: [
						'price' => $data['filter-price'],
						'updated_at' => $data['filter-date']
					]
				);
			}

			$payLoads = [];
			if($data['filter-type'] !== 'none') {
				$payLoads['filter-type'] = (int)$data['filter-type'];
			}
			else {
				$payLoads['filter-type'] = 'none';
			}
			if($data['filter-price'] !== 'none') {
				$payLoads['filter-price'] = $data['filter-price'];
			}
			else {
				$payLoads['filter-price'] = 'none';
			}
			if($data['filter-date'] !== 'none') {
				$payLoads['filter-date'] = $data['filter-date'];
			}
			else {
				$payLoads['filter-date'] = 'none';
			}

			$_SESSION['filter-data'] = $products;
			$_SESSION['filter-status'] = true;

			$renderData = [];
			for($i = 0; $i < min(count($products), 5); ++$i) {
				array_push($renderData, $products[$i]);
			}

			$payLoads['products'] = $renderData;

			$limit = 5;
			$page = 1;

			$paginator = new Paginator(
				recordsPerPage: $limit, 
				totalRecords: count($_SESSION['filter-data']), 
				currentPage: $page
			);

			$pages = $paginator->getPages();

			$pagination = [
				'limit' => $limit,
				'prevPage' => $paginator->getPrevPage(),
				'currPage' => $paginator->getCurrPage(),
				'nextPage' => $paginator->getNextPage(),
				'pages' => $pages
			];

			$payLoads['filter-pagination'] = $pagination;

			renderPage('/admin/index.php', $payLoads);
		}
	}

	public function print(array $data) {
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
}