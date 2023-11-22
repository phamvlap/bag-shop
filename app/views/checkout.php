<?php require_once __DIR__ . '/components/head.php'; ?>
<?php require_once __DIR__ . '/components/symbol.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container p-0 content">
		<div class="row m-0 cart">
			<div class="col col-md-8 offset-md-2 bg-white rounded-2">
				<h2 class="text-center m-0 p-3 cart-heading fw-bold">Xác nhận đặt hàng</h2>
				<!-- user -->
				<div class="p-3 cart-info-user">
					<?php $htmlspecialchars = 'htmlspecialchars' ?>

					<h3 class="m-0 px-4"><strong>Thông tin khách hàng:</strong></h3>

					<div class="row m-0 p-2 mt-4">
						<span class="col col-md-2 p-0">Họ tên: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['name']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Số điện thoại: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['phone_number']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Email: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['email']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Địa chỉ: </span>
						<strong class="col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['address']) ?></strong>
					</div>
				</div>

				<!-- items -->
				<div class="p-3 cart-body preorder-body">
					<h3 class="m-0 px-4"><strong>Thông tin sản phẩm:</strong></h3>

					<!-- list items -->
					<?php foreach($_SESSION['rows'] as $row): ?>
						<div class="row justify-content-between p-3 rounded-3 mt-3 preorder-items">
							<div class="col col-md-6">
								<div class="row">
									<div class="col col-md-3">
										<?php $image = explode(';', $row['images'])[0]; ?>
										<img src="/uploads/<?= $image ?>" alt="" width="100%" height="72px">
									</div>
									<div class="col col-md-9"><?= $htmlspecialchars($row['name']) ?></div>
								</div>
							</div>
							<div class="col col-md-3">
								<div class="row">
									<div class="col col-md-6">Giá:</div>
									<div class="col col-md-6 text-end">
										<?php echo formatMoney($row['price']) ?>
									</div>
								</div>
								<div class="row">
									<div class="col col-md-6">Số lượng:</div>
									<div class="col col-md-6 text-end"><?= $row['count'] ?></div>
								</div>
								<div class="row">
									<div class="col col-md-6">Tạm tính:</div>
									<div class="col col-md-6 text-end">
										<strong>
											<?php 
												$tmpTotal = $row['price'] * $row['count'];
												echo formatMoney($tmpTotal);
											?>
										</strong>
										<span>đ</span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>

					<div class="py-3">
						<h3 class="m-0 px-4"><strong>Hình thức thanh toán:</strong></h3>

						<div class="py-1 px-3">
							<input 
								id="on-site"
								type="radio" 
								name="method-payment" 
								value="on-site"
							>
							<label class="form-check-label" for="on-site">Thanh toán khi nhận hàng</label>
						</div>
						<div class="py-1 px-3">
							<input 
								id="deposit"
								type="radio" 
								name="method-payment" 
								value="deposit" 
							>
							<label class="form-check-label" for="deposit">Thanh toán bằng hình thức chuyển khoản</label>
						</div>
					</div>

					<!-- cart -->
					<div class="row mx-0 mt-2 rounded-2 p-3">
						<div class="col col-md-6 offset-md-6">
							<div class="row py-2">
								<p class="col col-md-8 m-0">Tổng thanh toán tạm thời: </p>
								<p class="col col-md-4 m-0 text-end">
									<span><?php echo formatMoney($_SESSION['total']) ?></span> 
									<span>đ</span>
								</p>
							</div>
							<div class="row py-2">
								<p class="col col-md-8 m-0">Giảm giá: </p>
								<p class="col col-md-4 m-0 text-end">
									<span>0</span> 
									<span>đ</span>
								</p>
							</div>
							<div class="row py-2">
								<p class="col col-md-8 m-0">Phí vận chuyển: </p>
								<p class="col col-md-4 m-0 text-end">
									<span>0</span> 
									<span>đ</span>
								</p>
							</div>
							<div class="row py-2 fw-bold">
								<p class="col col-md-8 m-0">TỔNG THANH TOÁN: </p>
								<p class="col col-md-4 m-0 text-end">
									<span>
										<?php echo formatMoney($_SESSION['total']) ?>
									</span> 
									<span>đ</span>
								</p>
							</div>
							<div class="text-center">
								<form action="/checkout" method="post">
									<button id="checkout-btn" class="btn btn-fill-primary order-btn">Đặt hàng</button>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<input 
	type="text" 
	name="status-order" 
	value="<?php
		if(isset($_SESSION['status-order'])) {
			if($_SESSION['status-order']) {
				echo 'success';	
			}
			else {
				echo 'failed';
			}
		}
	?>"
>

<!-- Button trigger modal alert order -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alert-order" hidden></button>

<!-- Modal alert order -->
<div class="modal fade" id="alert-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<?php 
					if(isset($_SESSION['status-order'])) {
						if($_SESSION['status-order']) {
							echo '<div class="alert alert-success d-flex align-items-center mt-3" role="alert">
							        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
							        <div>' . $_SESSION['message-order'] . '</div>
							    </div>';
						}
						else {
							echo '<div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
							        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							        <div>' . $_SESSION['message-order'] . '</div>
							    </div>';
						}
						unset($_SESSION['message-order']);
					}
				?>

			</div>
			<div class="modal-footer">
				<a href="/" class="btn btn-fill-primary order-btn">Trở về trang chủ</a>

				<?php 
					if(isset($_SESSION['status-order'])) {
						if($_SESSION['status-order']) {
							echo '<a href="/cart" class="btn btn-fill-primary order-btn">Tiếp tục mua hàng</a>';
						}
						else {
							echo '<a href="/checkout/view" class="btn btn-fill-primary order-btn">Ở lại trang này</a>';
						}
						unset($_SESSION['status-order']);
					}
				?>
			</div>
		</div>
	</div>
</div>

<!-- foot -->
<?php require_once __DIR__ . '/components/foot.php'; ?>
