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