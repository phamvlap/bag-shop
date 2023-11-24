<?php require_once __DIR__ . '/components/head.php'; ?>
<?php require_once __DIR__ . '/components/symbol.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">	
			<div id="history-purchase" class="row bg-white m-0 p-3">
				<?php require_once __DIR__ . '/profile_user/sidebar.php'; ?>

				<div class="col col-md-9 p-3">
					<h3 class="m-0">Đơn hàng của tôi</h3>

					<?php 
						if(isset($_SESSION['success-order-destroy'])) {
							echo '
							<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
								<strong>' . $_SESSION['success-order-destroy'] . '</strong>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>';
							unset($_SESSION['success-order-destroy']);
						}
						if(isset($_SESSION['failed-order-destroy'])) {
							echo '
							<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
								<strong>' . $_SESSION['failed-order-destroy'] . '</strong>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>';
							unset($_SESSION['failed-order-destroy']);
						}
					?>

					<?php foreach($_SESSION['invoices'] as $invoice): ?>
						<div class="row invoice p-4 mx-0 mt-3">
							<div class="row justify-content-between p-2">
								<p class="m-0 col col-md-4">
									<strong>Đơn hàng: </strong>
									<span>#<?= $invoice['id_invoice'] ?></span>
								</p>
								<p class="m-0 col col-md-4 text-end status">
									<?php 
										if((int)$invoice['status'] === 1) {
											echo '<strong style="color: green">Đơn hàng đã được duyệt</strong>';
										}
										elseif((int)$invoice['status'] === 0) {
											echo '<strong style="color: orange">Đơn hàng đang chờ duyệt</strong>';
										}
										elseif((int)$invoice['status'] === -1) {
											echo '<strong style="color: red">Đơn hàng đã hủy</strong>';
										}
									?>
								</p>
							</div>
							<hr>
							<div class="row justify-content-between p-2">
								<div class="m-0 col col-md-6">
									<a href="/user/history-order/detail/<?= $invoice['id_invoice'] ?>">
										<div class="row">
											<?php 
												$sumary = '';
												foreach($invoice['details'] as $item) {
													$sumary .= $item['name'];
												}
												if(strlen($invoice['details'][0]['images']) > 0) {
													$presentImage = explode(';',  $invoice['details'][0]['images'])[0];
												}
												else {
													$presentImage = 'no_image.jpg';
												}
											?>
											<div class="col col-md-2">
												<img src="/uploads/<?= $presentImage ?>" alt="" width="100%" height="46px">
											</div>
											<div class="col col-md-10 sumary"><?= $sumary ?></div>
										</div>
									</a>
								</div>
								<div class="m-0 col col-md-3 text-end">
									<span>Tổng tiền</span>
									<span><strong><?php echo formatMoney($invoice['total']) ?></strong> đ</span>
								</div>
							</div>
							<div class="row p-2 mt-2">
								<div class="col col-md-4 offset-md-8 text-end">
									<a href="/user/history-order/detail/<?= $invoice['id_invoice'] ?>" class="btn btn-outline-primary">Xem chi tiết</a>
								</div>
							</div>
						</div>
					<?php endforeach ?>	

				</div>
			</div>
			<!-- footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
