<div class="row align-item-center header rounded-bottom">
	<div class="col-md-2 text-center">
		<a href="/home">
			<img class="logo" src="../resources/assets/images/logo.jpeg" alt="">
		</a>
	</div>

	<div class="col-md-7 d-flex align-items-center">
		<div class="w-100">
			<form class="row bg-white rounded-2" action="/search" method="post">
				<input class="col-md-10 py-2 px-3 border-0 border-end rounded-start" type="text" placeholder="Nhập sản phẩm tìm kiếm...">
				<button type="submit" class="col-md-2 btn btn-light border-0 search-btn">Tìm kiếm</button>
			</form>
		</div>
	</div>

	<div class="col-md-2 d-flex align-items-center justify-content-center">
		<?php 
		if(isset($_SESSION['userid'])) {
			echo <<<HTML
				<div class="d-flex align-items-center justify-content-center w-100">
					<div class="d-flex align-items-center justify-content-center position-relative account-logined">
						<div class="p-1">
							<img class="rounded-circle" width="28px" src="../resources/assets/images/nobita.jpeg" alt="">
						</div>
						<div class="p-1">
							<p class="m-0">{$_SESSION['username']}</p>
						</div>
						<div class="position-absolute bg-white rounded-2 overflow-hidden optional-account">
							<ul class="m-0 p-0 list-unstyled">
								<li>
									<a class="d-block py-3 px-4" href="#">Tài khoản của tôi</a>
								</li>
								<li>
									<a class="d-block py-3 px-4" href="/handler/logout.php">Đăng xuất</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				HTML;
		}
		else {
			echo <<<HTML
				<div class="row w-100 align-items-center justify-content-center account">
					<a id="sign-in" class="d-block col-md-6 m-0 pt-2 px-1 text-center text-decoration-none" href="/signin">Đăng nhập</a>
					<a id="sign-up" class="d-block col-md-6 m-0 pt-2 px-1 text-center text-decoration-none" href="/signup">Đăng ký</a>
				</div>
				HTML;
		}
		?>
	</div>

	<div class="col-md-1 d-flex align-items-center justify-content-center">
		<div id="cart" class="px-3 rounded-2 position-relative">
			<a href="/cart">
				<i class="fa-solid fa-cart-shopping"></i>
				<span class="position-absolute d-inline-block rounded-pill cart-count"></span>
			</a>
		</div>
	</div>
</div>