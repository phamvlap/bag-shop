<div class="modal fade" id="delete-item" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<span>Bạn có chắc chắn muốn xóa sản phẩm </span>
				<strong>
					<?php 
					if(isset($_SESSION['delete-item'])) {
						echo $htmlspecialchars($_SESSION['delete-item']['name']);
					}
					?>
				</strong>
				<span> không ?</span>
			</div>
			<div class="modal-footer">
				<a href="/admin/product" class="btn btn-secondary" style="font-size: 1.6rem;">Đóng</a>
				<form action="/admin/product/delete/<?= $htmlspecialchars($_SESSION['delete-item']['id_product']) ?>" method="post">
					<button type="submit" class="btn btn-fill-primary order-btn">Xóa</button>
				</form>
			</div>
		</div>
	</div>
</div>