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