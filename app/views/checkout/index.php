<?php require_once __DIR__ . '/../components/head.php'; ?>
<?php require_once __DIR__ . '/../components/symbol.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div class="container fixed-top">
		<?php require_once __DIR__ . '/../components/header.php'; ?>
	</div>

	<div class="container p-0 content">
		<div class="row m-0 cart">
			<div class="col col-md-8 offset-md-2 bg-white rounded-2">
				<h2 class="text-center m-0 p-3 cart-heading fw-bold">Xác nhận đặt hàng</h2>
				
				<!-- info user -->
				<?php require_once __DIR__ . '/info_user.php'; ?>

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
						
						<!-- load payment section -->
						<?php require_once __DIR__ . '/order_payment.php'; ?>

					</div>

				</div>
			</div>

			<!-- footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/../components/footer.php'; ?>
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
<?php require_once __DIR__ . '/modal_alert_order.php'; ?>

<!-- foot -->
<?php require_once __DIR__ . '/../components/foot.php'; ?>
