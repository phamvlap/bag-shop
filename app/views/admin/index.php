<?php require_once __DIR__ . '/../components/head.php'; ?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<div id="admin-home" class="container-fluid p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/navbar.php' ?>

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

		<div class="p-4">
			<a href="/admin/product/add" class="btn btn-fill-primary">
				<i class="fa-solid fa-plus"></i>
				<span>Thêm sản phẩm</span>
			</a>
		</div>

		<!-- table products -->
		<div class="mx-4">
			<table class="table table-striped table-product">
				<thead>
					<tr style="width: 100%">
						<th scope="col" class="text-center" style="width: 3%">STT</th>
						<th scope="col" class="text-center" style="width: 10%">Hình ảnh</th>
						<th scope="col" class="text-center" style="width: 20%">Tên sản phẩm</th>
						<th scope="col" class="text-center" style="width: 28%">Mô tả</th>
						<th scope="col" class="text-center" style="width: 7%">Loại sản phẩm</th>
						<th scope="col" class="text-center" style="width: 10%">Giá bán (đ)</th>
						<th scope="col" class="text-center" style="width: 12%">Ngày cập nhật</th>
						<th scope="col" class="text-center" style="width: 10%">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?> 

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
							<td scope="col"><?= $htmlspecialchars($product['describes']) ?></td>
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
							<td scope="col" class="text-center"><?= $htmlspecialchars($product['price']) ?></td>
							<td scope="col" class="text-center">
								<?php
									$date = explode(' ', $product['updated_at']);
									echo $date[1] . ' ' . $htmlspecialchars(date('d-m-Y', strtotime($date[0])));
								?>
							</td>
							<td scope="col" class="text-center vertical-center">
								<a href="/admin/product/edit/<?= $htmlspecialchars($product['id_product']) ?>" class="btn btn-warning">
									<i class="fa-solid fa-pen"></i>
									<span>Sửa</span>
								</a>
								<a href="/admin/product/delete/<?= $htmlspecialchars($product['id_product']) ?>" class="btn btn-danger ms-2">
									<i class="fa-regular fa-trash-can"></i>
									<span>Xóa</span>
								</a>
							</td>
						</tr>

						<?php ++$count ?>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>

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
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
