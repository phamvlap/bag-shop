<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<!-- sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php require_once __DIR__ . '/components/sidebar.php'; ?>
			</div>

			<div class="col-md-10 p-0">
				<div id="detail-item" class="ms-2">
					<!-- detail product -->
					<?php 
						$imgs = explode(';', $_SESSION['item']['images']);
					?>

					<div class="row">
						<div class="col-md-6">
							<div id="imagesDetailItem" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
									    <img src="/uploads/<?= $imgs[0] ?>" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
									    <img src="/uploads/<?= $imgs[0] ?>" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="/uploads/<?= $imgs[0] ?>" class="d-block w-100" alt="...">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#imagesDetailItem" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#imagesDetailItem" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
						<div class="col-md-6 p-0">
							<div class="p-4 bg-white rounded-2 detail-item">
								<h3 class="m-0"><?= $_SESSION['item']['name'] ?></h3>
								<div class="mt-4">
									<strong class="price-per-item"><?= $_SESSION['item']['price'] ?></strong>
									<span>đ</span>
								</div>
								<div class="mt-4 quantity-btns">
									<span>Số lượng:</span>
									<div class="d-inline-flex align-items-center">
										<button class="btn btn-secondary py-0 border-0" id="decrease-btn">-</button>
										<input class="mx-2 border-1 text-center rounded-1" id="quantity" width="100px" type="text" name="" value="1">
										<button class="btn btn-secondary py-0 border-0" id="increase-btn">+</button>
									</div>
								</div>
								<div class="mt-4">
									<span>Tổng tạm thời:</span>
									<div class="d-inline-block">
										<strong class="tmp-price"></strong>
										<span>đ</span>
									</div>
								</div>
								<div class="row mt-5">
									<div class="col-md-6 text-center">
										<button class="btn btn-outline-primary">Thêm vào giỏ</button>
									</div>
									<div class="col-md-6 text-center">
										<button class="btn btn-fill-primary">Đặt hàng</button>
									</div>
								</div>
							</div>
							<div class="p-4 mt-3 bg-white describe">
								<h3 class="fw-bold">Mô tả sản phẩm</h3>
								<p class="p-0"><?= $_SESSION['item']['describes'] ?></p>
							</div>
						</div>
					</div>

				</div>

				<!-- Footer -->
				<div id="footer" class="container mt-3 bg-white rounded-top-2">
					<?php require_once __DIR__ . '/components/footer.php'; ?>
				</div>

			</div>
		</div>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
