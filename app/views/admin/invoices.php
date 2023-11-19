<?php require_once __DIR__ . '/../components/head.php'; ?>
<?php require_once __DIR__ . '/../components/symbol.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/components/navbar.php' ?>

	<!-- content -->
	<div class="content mt-5">
		<!-- filter invoice bar -->
		<div class="row">
			<div class="col col-md-10 offset-md-2">
				<?php require_once __DIR__ . '/components/filter_invoice.php'; ?>
			</div>
		</div>

		<div class="mt-5">
			<table class="table table-striped align-middle table-invoice">
				<thead>
					<tr style="width: 100%">
						<th scope="col" class="text-center" style="width: 15%">Mã hóa đơn</th>
						<th scope="col" class="text-center" style="width: 25%">Ngày lập</th>
						<th scope="col" class="text-center" style="width: 15%">Tổng tiền (đ)</th>
						<th scope="col" class="text-center" style="width: 30%">Trạng thái</th>
						<th scope="col" class="text-center" style="width: 15%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($_SESSION['invoices'] as $invoice): ?>
						<tr>
							<td scope="col" class="text-center">
								<div class="p-2">
									<a href="/admin/invoice/view/<?= $htmlspecialchars($invoice['id_invoice']) ?>" style="color: var(--primary-bg-color);">
										<span><strong>#<?= $htmlspecialchars($invoice['id_invoice']) ?></strong></span>
									</a>
								</div>
							</td>
							<td scope="col" class="text-center">
								<?php
									$date = explode(' ', $invoice['created_at']);
									echo $date[1] . ' ' . $htmlspecialchars(date('d-m-Y', strtotime($date[0])));
								?>
							</td>
							<td scope="col" class="text-center">
								<?php 
									$money = formatMoney((int)$invoice['total']);
									echo $money;
								?>
							</td>
							<td scope="col" class="text-center">
								<?php
									if((int)$invoice['status'] === 1) {
										echo '<span style="color: green">Đã duyệt</span>';
									}
									elseif((int)$invoice['status'] === 0) {
										echo '<span style="color: orange">Đang chờ duyệt</span>';
									}
									elseif((int)$invoice['status'] === -1) {
										echo '<span style="color: red">Đã hủy</span>';
									}
								?>
							</td>
							<td scope="col" class="text-center">
								<div class="p-2">
									<a href="/admin/invoice/view/<?= $htmlspecialchars($invoice['id_invoice']) ?>" class="btn btn-info">
										<i class="fa-solid fa-circle-info"></i>
										<span>Xem chi tiết</span>
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
	<?php require_once __DIR__ . '/../components/copyright.php'; ?>;

</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>
