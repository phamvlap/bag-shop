<?php require_once __DIR__ . '/../../components/head.php'; ?>
<?php require_once __DIR__ . '/../../components/symbol.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../components/navbar.php' ?>

	<!-- content -->
	<div class="content mt-5">
		<!-- title: id_invoice, status, date order -->
		<div class="p-4 bg-white">
			<h3 class="m-0 text-center" style="font-size: 2.0rem">
				<strong>Chi tiết đơn hàng <span>#<?= $_SESSION['invoice']['id_invoice'] ?></span></strong>
			</h3>

			<div class="row">
				<div class="col col-md-8 offset-md-2">
					<div class="row p-3">
						<div class="col col-md-9">
							<!-- title of invoice -->
							<?php require_once __DIR__ . '/invoice_title.php'; ?>

						</div>
						<div class="col col-md-3 row align-items-center justify-content-center">
							<?php
								if((int)$_SESSION['invoice']['status'] === 0) {
									echo '
									<form action="/admin/invoice/update/' . $_SESSION['invoice']['id_invoice'] . '" method="post" class="row justify-content-center">
										<button type="submit" class="btn btn-fill-primary px-3">
											<i class="fa-solid fa-check-double px-2"></i>
											Duyệt đơn hàng</button>
									</form>';
								}
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="detail-invoice mt-2">
				<div class="row me-0">
					<!-- info user -->
					<div class="col col-md-4">
						<!-- info user and payment -->
						<?php require_once __DIR__ . '/info_user.php'; ?>

					</div>

					<!-- items -->
					<div class="col col-md-8 section p-3 rounded-3">
						<h4 class="m-0"><strong>Thông tin sản phẩm</strong></h4>

						<?php foreach($_SESSION['invoice']['items'] as $item): ?>
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
										<div class="col col-md-6 text-end">
											<?php 
												$money = formatMoney((int)$item['price']);
												echo "$money đ";
											?>
										</div>
									</div>
									<div class="row">
										<div class="col col-md-6">Số lượng:</div>
										<div class="col col-md-6 text-end"><?= $item['count'] ?></div>
									</div>
									<div class="row">
										<div class="col col-md-6">Tạm tính:</div>
										<div class="col col-md-6 text-end">
											<strong>
												<?php
													$tmpPrice = $item['price'] * $item['count']; 
													echo formatMoney($tmpPrice);
												?>
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
									<span>
										<?php  echo formatMoney($_SESSION['invoice']['total']); ?>
									</span> 
									<span>đ</span>
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<!-- copyright -->
	<?php require_once __DIR__ . '/../../components/copyright.php'; ?>;

</div>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
