<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<!-- Sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php require_once __DIR__ . '/components/sidebar.php'; ?>
			</div>

			<div class="col-md-10 p-0">
				<div class="ms-2">
					<!-- Banner -->
					<div class="row banner mt-3">
						<!-- Slide Banner -->
						<div id="slide-banner" class="col-md-9">
							<?php require_once __DIR__ . '/components/slide_banner.php'; ?>
						</div>
						<!-- Image Banner -->
						<div id="image-banner" class="col-md-3">
							<img class="w-100 rounded-2"src="../../../../images/sales/bigsale.jpg" class="d-block w-100" alt="" />
						</div>
					</div>
					<!-- Products -->
					<div id="products" class="row products px-1 mt-2">
						<?php foreach($_SESSION['products'] as $product): ?>
							<div class="col-md-3 mt-3 px-2">
								<?php
									$image = '1-1.jpg';
									if(strlen($product['images']) > 0){
										$image = (explode(';', $product['images']))[0];
									}
								?>
								<div class="card w-100" style="width: 18rem;" id="product_<?= $product['id_product']?>">
									<a href="/view/item/<?php echo $product['id_product'] ?>">
										<img src="../../../../images/products/<?php echo $image ?>" class="card-img-top" alt="...">
									</a>
									<div class="card-body p-3">
										<a href="/view/item/<?php echo $product['id_product'] ?>">
											<h4 class="card-title m-0 item-title"><?php echo $product['name'] ?></h4>
											<div class="d-flex justify-content-between mt-3 mb-2 item-text">
												<strong>
													<?php echo $product['price'] ?>
													<span><u>đ</u></span>
												</strong>
												<p class="m-0">Đã bán 100</p>
											</div>
										</a>
										<div class="text-center">
											<button class="btn btn-fill-primary">Thêm vào giỏ</button>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
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
