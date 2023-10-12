<?php require_once __DIR__ . '/Partials/Head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/Partials/Header.php'; ?>
	</div>

	<div class="container p-0 content">
		<div class="cart">
			<h2 class="bg-white text-center m-0 p-3 cart-heading fw-bold">Giỏ hàng của tôi</h2>
			<div class="cart-body">
				<div class="row bg-white mt-4 mx-0 p-2 cart-item">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2 text-center">
								<input type="checkbox">
							</div>
							<div class="col-md-10 text-center">Sản phẩm</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3 text-center">Giá</div>
							<div class="col-md-3 text-center">Số lượng</div>
							<div class="col-md-3 text-center">Tổng tạm thời</div>
							<div class="col-md-3 text-center">Xóa</div>
						</div>
					</div>
				</div>
				<!-- Cart body -->
				<div id="detail-cart"></div>

			</div>
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/Partials/Footer.php'; ?>
			</div>
		</div>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/Partials/Foot.php'; ?>
