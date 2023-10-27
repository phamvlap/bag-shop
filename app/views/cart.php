<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container p-0 content">
		<div class="cart">
			<h2 class="bg-white text-center m-0 p-3 cart-heading fw-bold">Giỏ hàng của tôi</h2>
			<div class="cart-body">
				<div class="row bg-white mt-4 mx-0 p-2 cart-item">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2 text-center"></div>
							<div class="col-md-10 text-center">Sản phẩm</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3 text-center">Giá</div>
							<div class="col-md-3 text-center">Số lượng</div>
							<div class="col-md-3 text-center">Tổng tạm thời</div>
							<div class="col-md-3 text-center">Xóa</div>
						</div>
					</div>
				</div>
				<!-- Cart body -->
				<div id="detail-cart"></div>

				<!-- Cart payment -->
				<div class="row bg-white mx-0 mt-4 rounded-2 p-3">
					<div class="col col-md-6 offset-md-6 payment">
						<div class="row py-2">
							<p class="col col-md-8 m-0">Tổng thanh toán tạm thời: </p>
							<p class="col col-md-4 m-0 text-end">
								<span id="cart-tmp-total">100000</span> 
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
								<span id="cart-total"></span> 
								<span>đ</span>
							</p>
						</div>
						<div class="text-center">
							<a href="/checkout/view" id="preorder-btn" class="btn btn-fill-primary order-btn">Chọn đặt hàng</a>
						</div>
					</div>

				</div>

			</div>
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<input 
	type="text" 
	name="is-exist-user" 
	value="<?php
		if(getOnceSession('is-exist-user') === false) {
			echo 'not-found';
		}
	?>"
	hidden
>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#request-login" hidden></button>

<!-- Modal -->
<div class="modal fade" id="request-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<strong>Bạn chưa đăng nhập, vui lòng đăng nhập để đặt hàng!</strong>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
				<a href="/user/signin" id="preorder-btn" class="btn btn-fill-primary order-btn">Đăng nhập</a>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
