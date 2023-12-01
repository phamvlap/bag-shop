<div class="modal fade" id="alert-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<?php 
					if(isset($_SESSION['status-order'])) {
						if($_SESSION['status-order']) {
							echo '<div class="alert alert-success d-flex align-items-center mt-3" role="alert">
							        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
							        <div>' . $_SESSION['message-order'] . '</div>
							    </div>';
						}
						else {
							echo '<div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
							        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							        <div>' . $_SESSION['message-order'] . '</div>
							    </div>';
						}
						unset($_SESSION['message-order']);
					}
				?>

			</div>
			<div class="modal-footer">
				<a href="/" class="btn btn-fill-primary order-btn">Trở về trang chủ</a>

				<?php 
					if(isset($_SESSION['status-order'])) {
						if($_SESSION['status-order']) {
							echo '<a href="/cart" class="btn btn-fill-primary order-btn">Tiếp tục mua hàng</a>';
						}
						else {
							echo '<a href="/checkout/view" class="btn btn-fill-primary order-btn">Ở lại trang này</a>';
						}
						unset($_SESSION['status-order']);
					}
				?>
			</div>
		</div>
	</div>
</div>