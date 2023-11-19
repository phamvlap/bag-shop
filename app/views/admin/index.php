<?php require_once __DIR__ . '/../components/head.php'; ?>
<?php require_once __DIR__ . '/../components/symbol.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/components/navbar.php' ?>

	<!-- content -->
	<div class="content mt-5">
		<!-- alert status when add new product, update product, delete product -->
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<!-- success -->
				<?php if(isset($_SESSION['message-success'])): ?>
				    <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
				    	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
						<strong><?php echo getOnceSession('message-success') ?></strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif ?>

				<!-- failed -->
				<?php if(isset($_SESSION['message-failed'])): ?>
				    <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
				    	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						<strong><?php echo getOnceSession('message-failed') ?></strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif ?>
			</div>
		</div>

		<!-- search product by name -->
		<div class="row">
			<div class="col col-md-6 offset-md-3 d-flex align-items-center">
				<div class="w-100">
					<form class="row bg-white rounded-pill overflow-hidden" id="admin-search-form" action="/admin/product/search" method="get">
						<input name="key" class="col-md-11 py-3 px-4 border-0 border-end rounded-start" type="text" placeholder="Nhập sản phẩm tìm kiếm...">
						<button type="submit" class="col-md-1 btn btn-light border-0 d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
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
					<?php require_once __DIR__ . '/components/filter.php'; ?>
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
									$type = $product['type'];
									$typeName = '';

									switch($type) {
										case 1: 
											$typeName = 'Túi du lịch';
											break;
										case 2: 
											$typeName = 'Balo thời trang nam, nữ';
											break;
										case 3: 
											$typeName = 'Túi chống sốc laptop';
											break;
										case 4: 
											$typeName = 'Balo Laptop';
											break;
									};

									echo $typeName;
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
	<?php require_once __DIR__ . '/components/paginator.php'; ?>

	<!-- copyright -->
	<?php require_once __DIR__ . '/../components/copyright.php'; ?>

</div>

<!-- hidden input to check confirm delete item -->
<input 
	type="text" 
	id="confirm-delete" 
	value="<?php 
		if(isset($_SESSION['delete-item'])) {
			echo $htmlspecialchars($_SESSION['delete-item']['id_product']);
		}
		else {
			echo '';
		}
	?>"
	hidden
>

<!-- button trigger modal confirm delete item -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-item" hidden></button>

<!-- modal confirm delete item -->
<div class="modal fade" id="delete-item" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<span>Bạn có chắc chắn muốn xóa sản phẩm </span>
				<strong>
					<?php 
					if(isset($_SESSION['delete-item'])) {
						echo $htmlspecialchars($_SESSION['delete-item']['name']);
					}
					?>
				</strong>
				<span> không ?</span>
			</div>
			<div class="modal-footer">
				<a href="/admin/product" class="btn btn-secondary" style="font-size: 1.6rem;">Đóng</a>
				<form action="/admin/product/delete/<?= $htmlspecialchars($_SESSION['delete-item']['id_product']) ?>" method="post">
					<button type="submit" class="btn btn-fill-primary order-btn">Xóa</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	purgeSESSION('delete-item');
?>

<?php require_once __DIR__ . '/../components/foot.php'; ?>
