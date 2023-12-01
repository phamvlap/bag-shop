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