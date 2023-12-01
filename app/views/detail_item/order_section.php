<div class="p-4 bg-white rounded-2 detail-item">
	<h3 class="m-0 detail-item-name"><?= $_SESSION['item']['name'] ?></h3>
	<div class="mt-4 detail-item-price color-heading">
		<strong class="price">
			<?php echo formatMoney($_SESSION['item']['price']) ?>
		</strong>
		<span>đ</span>
	</div>
	<div class="mt-4 quantity-item">
		<span>Số lượng:</span>
		<div class="d-inline-flex align-items-center">
			<input type="number" value="1" min="1">
		</div>
	</div>
	<div class="mt-4">
		<span>Tổng tạm thời:</span>
		<div class="d-inline-block">
			<strong class="tmp-price-item color-heading">
				<?php echo formatMoney($_SESSION['item']['price']) ?>
			</strong>
			<span>đ</span>
		</div>
	</div>
	<div class="row mt-5">
		<div class="text-center">
			<button class="btn btn-outline-primary add-item-btn">Thêm vào giỏ</button>
		</div>
	</div>
</div>