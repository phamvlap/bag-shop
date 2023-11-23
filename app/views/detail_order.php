<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">	
			<div id="profile-user" class="row bg-white m-0 p-3">
				<?php require_once __DIR__ . '/components/customer/sidebar.php'; ?>

				<div class="col col-md-9 p-3">
					<!-- title: id_invoice, status, date order -->
					<div class="row">
						<h3 class="col col-md-3 m-0">Chi tiết đơn hàng:</h3>
						<div class="col col-md-5 d-flex align-items-end">
							<span style="font-size: 1.6rem">#<?= $_SESSION['invoice']['id_invoice'] ?> -</span>
							<?php
								if((int)$_SESSION['invoice']['status'] === 1) {
									echo '<strong style="font-size: 1.6rem; color: green" class="ps-1"> 
										Đơn hàng đã được duyệt
										</strong>';
								}
								elseif((int)$_SESSION['invoice']['status'] === 0) {
									echo '<strong style="font-size: 1.6rem; color: orange" class="ps-1"> 
										Đơn hàng đang chờ duyệt
										</strong>';
								}
								elseif((int)$_SESSION['invoice']['status'] === -1) {
									echo '<strong style="font-size: 1.6rem; color: red" class="ps-1"> 
										Đơn hàng đã hủy
										</strong>';
								}
							?>
						</div>
						<div class="col col-md-4 d-flex align-items-end">
							<span style="font-size: 1.4rem">Đặt hàng lúc:</span>
							<?php
								$dateTime = explode(' ', $_SESSION['invoice']['created_at']);
								$day  = (int)date('w', strtotime($dateTime[0]));
								$dayOfWeek = retrieveDay(day: $day);

								echo  '<span style="font-size: 1.4rem" class="ps-1">' . date('H:i',  strtotime($dateTime[1])) . ' ' . $dayOfWeek . ', ' . date('d/m/Y', strtotime($dateTime[0])) . '</span>';
							?>
						</div>
					</div>

					<div class="detail-invoice mt-2">
						<div class="row me-0">
							<!-- info user -->
							<div class="col col-md-8">
								<div class="p-3 rounded-3 section">
									<h4 class="m-0"><strong>Thông tin khách hàng</strong></h4>
									<div class="mt-2">
										<div class="row">
											<div class="col col-md-3">Người nhận: </div>
											<div class="col col-md-9"><?= $htmlspecialchars($_SESSION['user']['name']) ?></div>
										</div>
										<div class="row">
											<div class="col col-md-3">Số điện thoại: </div>
											<div class="col col-md-9"><?= $htmlspecialchars($_SESSION['user']['phone_number']) ?></div>
										</div>
										<div class="row">
											<div class="col col-md-3">Nhận tại: </div>
											<div class="col col-md-9"><?= $htmlspecialchars($_SESSION['user']['address']) ?></div>
										</div>
									</div>
								</div>
							</div>

							<!-- method payment -->
							<div class="col col-md-4 p-0 rounded-3 p-3 section">
								<h4 class="m-0"><strong>Hình thức thanh toán</strong></h4>

								<p class="m-0 mt-2">
									<?php
										if($_SESSION['invoice']['method_payment'] === 'on-site') {
											echo "Thanh toán khi nhận hàng";
										}
										elseif($_SESSION['invoice']['method_payment'] === 'deposit') {
											echo "Thanh toán bằng hình thức chuyển khoản";
										}
									?>
								</p>
							</div>
						</div>

						<!-- items -->
						<div class="mt-3 section p-3 rounded-3">
							<h4 class="m-0"><strong>Thông tin sản phẩm</strong></h4>

							<?php foreach($_SESSION['invoice']['details'] as $item): ?>
								<div class="row justify-content-between p-3 mt-3 preorder-items border-bottom">
									<div class="col col-md-6">
										<div class="row">
											<div class="col col-md-3">
												<?php $image = explode(';', $item['images'])[0]; ?>
												<img src="/uploads/<?= $image ?>" class="rounded-3" alt="" width="100%" height="72px">
											</div>
											<div class="col col-md-9"><?= $htmlspecialchars($item['name']) ?></div>
										</div>
									</div>
									<div class="col col-md-3">
										<div class="row">
											<div class="col col-md-6">Giá:</div>
											<div class="col col-md-6 text-end"><?php echo formatMoney($item['price']) ?> đ</div>
										</div>
										<div class="row">
											<div class="col col-md-6">Số lượng:</div>
											<div class="col col-md-6 text-end"><?= $item['count'] ?></div>
										</div>
										<div class="row">
											<div class="col col-md-6">Tạm tính:</div>
											<div class="col col-md-6 text-end">
												<strong>
													<?php echo formatMoney($item['price'] * $item['count']); ?>
												</strong>
												<span>đ</span>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>

							<div class="col col-md-6 offset-md-6 p-3 payment">
								<div class="row py-2 fw-bold">
									<p class="col col-md-8 m-0">Tổng tiền: </p>
									<p class="col col-md-4 m-0 text-end">
										<span><?php echo formatMoney($_SESSION['invoice']['total']) ?></span> 
										<span>đ</span>
									</p>
								</div>
								<div class="row py-2 fw-bold">
									<p class="col col-md-8 m-0">Số tiền đã thanh toán: </p>
									<p class="col col-md-4 m-0 text-end">
										<span><?php echo formatMoney($_SESSION['invoice']['total']) ?></span> 
										<span>đ</span>
									</p>
								</div>
							</div>
						</div>

						<?php 
							if((int)$_SESSION['invoice']['status'] === 0) {
								echo '<div class="row justify-content-center p-3 m-0 mt-3 rounded-2 section">
										<span class="col col-md-2 m-0 text-center destroy-order">Hủy đơn hàng</span>
									</div>';
							}
						?>

						<div class="text-center mt-4">
							<a href="/user/history-order" class="btn btn-fill-primary rounded-pill">Trở về trang danh sách đơn hàng</a>
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

<!-- Button trigger modal destroy order -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm-destroy-order" hidden></button>

<!-- Modal destroy order -->
<div class="modal fade" id="confirm-destroy-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					$titleOrder = '';
					foreach($_SESSION['invoice']['details'] as $item) {
						$titleOrder .= $item['name'];
					}
					echo "Bạn có chắc chắn muốn hủy đơn hàng <strong>{$titleOrder}</strong> không ?";
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
				<a href="/user/history-order/destroy/<?= $_SESSION['invoice']['id_invoice'] ?>" class="btn btn-fill-primary order-btn">Đồng ý</a>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
