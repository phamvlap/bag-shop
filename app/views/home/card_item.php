<div class="card w-100" style="width: 18rem;" id="product_<?= $product['id_product'] ?>">
	<a href="/view/item/<?= $product['id_product'] ?>" title="<?= $product['name'] ?>">
		<img src="/uploads/<?= $image ?>" class="card-img-top" alt="<?= $product['name'] ?>">
	</a>
	<div class="card-body p-3">
		<a href="/view/item/<?= $product['id_product'] ?>">
			<h4 class="m-0 item-title"><?= $htmlspecialchars($product['name']) ?></h4>
			<div class="d-flex justify-content-between mt-3 mb-2 item-text">
				<strong class="color-heading">
					<?php echo formatMoney($product['price']) ?>
					<span>đ</span>
				</strong>
				<p class="m-0">Đã bán <?= $product['sold_quantity'] ?></p>
			</div>
		</a>
		<div class="text-center">
			<button class="btn btn-fill-primary">Thêm vào giỏ</button>
		</div>
	</div>
</div>