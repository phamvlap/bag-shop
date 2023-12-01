<div class="p-3 cart-info-user">
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