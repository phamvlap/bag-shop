<!-- info user -->
<div class="p-3 rounded-3 section">
	<h4 class="m-0"><strong>Thông tin khách hàng</strong></h4>
	<div class="mt-2">
		<div class="row">
			<div class="col col-md-4">Họ và tên: </div>
			<div class="col col-md-8"><?= $htmlspecialchars($_SESSION['invoice']['customer']['name']) ?></div>
		</div>
		<div class="row">
			<div class="col col-md-4">Số điện thoại: </div>
			<div class="col col-md-8"><?= $htmlspecialchars($_SESSION['invoice']['customer']['phone_number']) ?></div>
		</div>
		<div class="row">
			<div class="col col-md-4">Địa chỉ: </div>
			<div class="col col-md-8"><?= $htmlspecialchars($_SESSION['invoice']['customer']['address']) ?></div>
		</div>
	</div>
</div>

<!-- method payment -->
<div class="p-0 rounded-3 p-3 mt-3 section">
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