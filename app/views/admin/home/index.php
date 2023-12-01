<?php require_once __DIR__ . '/../../components/head.php'; ?>
<?php require_once __DIR__ . '/../../components/symbol.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../components/navbar.php' ?>

	<!-- content -->
	<div class="content mt-5">
		<!-- alert status when add new product, update product, delete product -->
		<div class="row">
			<!-- alert -->
			<?php require_once __DIR__ . '/alert.php'; ?>

		</div>

		<!-- search product by name -->
		<div class="row">
			<div class="col col-md-6 offset-md-3 d-flex align-items-center">
				<div class="w-100">
					<!-- search form -->
					<?php require_once __DIR__ . '/search_form.php'; ?>

				</div>
			</div>
		</div>

		<div class="mt-5">
			<div class="row align-items-center">
				<div class="col col-md-3">
					<a href="/admin/product/add" class="btn btn-fill-primary">
						<i class="fa-solid fa-plus"></i>
						<span>Thêm sản phẩm</span>
					</a>
				</div>
				<div class="col col-md-9">
					<!-- filter products -->
					<?php require_once __DIR__ . '/filter.php'; ?>

				</div>
			</div>
		</div>

		<!-- table products -->
		<div class="mt-3">
			<table class="table table-striped table-product">
				<thead>
					<tr style="width: 100%">
						<th scope="col" class="text-center" style="width: 5%">STT</th>
						<th scope="col" class="text-center" style="width: 20%">Hình ảnh</th>
						<th scope="col" class="text-center" style="width: 30%">Tên sản phẩm</th>
						<th scope="col" class="text-center" style="width: 15%">Loại sản phẩm</th>
						<th scope="col" class="text-center" style="width: 10%">Giá bán (đ)</th>
						<th scope="col" class="text-center" style="width: 35%">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$currentPage = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
						$limit = (isset($_GET['limit']) && is_numeric($_GET['page'])) ? $_GET['limit'] : 8;

						$count = ($currentPage - 1) * $limit + 1;
					?> 

					<?php foreach($_SESSION['products'] as $product): ?>
						<tr>
							<td scope="col" class="text-center"><?= $htmlspecialchars($count) ?></td>
							<td scope="col" class="text-center">
								<?php
									$imgs = explode(';', $product['images']);
									echo "<img src='/uploads/{$imgs[0]}'' width='120px' alt=''>";
								?>
							</td>
							<td scope="col"><?= $htmlspecialchars($product['name']) ?></td>
							<td scope="col" class="text-center">
								<?php 
									echo retrieveTypeItem($product['type']);
								?>
							</td>
							<td scope="col" class="text-center">
								<?php 
									$money = formatMoney((int)$product['price']);
									echo $money;
								?>
							</td>
							<td scope="col" class="text-center vertical-center">
								<div class="p-2">
									<a href="/admin/product/view/<?= $htmlspecialchars($product['id_product']) ?>" class="btn btn-info">
										<i class="fa-solid fa-circle-info"></i>
										<span>Xem chi tiết</span>
									</a>
								</div>
								<div class="p-2">
									<a href="/admin/product/edit/<?= $htmlspecialchars($product['id_product']) ?>" class="btn btn-warning">
										<i class="fa-solid fa-pen"></i>
										<span>Sửa</span>
									</a>
									<a href="/admin/product/delete/<?= $htmlspecialchars($product['id_product']) ?>" class="btn btn-danger ms-2">
										<i class="fa-regular fa-trash-can"></i>
										<span>Xóa</span>
									</a>
								</div>
							</td>
						</tr>

						<?php ++$count ?>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>

	<!-- pagination -->
	<?php require_once __DIR__ . '/../components/paginator.php'; ?>

	<!-- copyright -->
	<?php require_once __DIR__ . '/../../components/copyright.php'; ?>

</div>

<!-- hidden input to check confirm delete item -->
<input 
	type="hidden" 
	id="confirm-delete" 
	value="<?php 
		if(isset($_SESSION['delete-item'])) {
			echo $htmlspecialchars($_SESSION['delete-item']['id_product']);
		}
		else {
			echo '';
		}
	?>"
>

<!-- button trigger modal confirm delete item -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-item" hidden></button>

<!-- modal confirm delete item -->
<?php require_once __DIR__ . '/confirm_delete_modal.php'; ?>

<?php
	purgeSESSION('delete-item');
?>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
