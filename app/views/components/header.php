<div class="row align-item-center header rounded-bottom">
	<div class="col-md-2 text-center d-flex align-items-center justify-content-center logo-shop">
		<a href="/home" class="d-block d-flex align-items-center">
			<i class="fa-solid fa-store logo-shop-icon"></i>
			<span class="px-2 logo-shop-name"><?= APP_NAME ?></span>
		</a>
	</div>

	<div class="col-md-7 d-flex align-items-center">
		<div class="w-100">
			<form class="row bg-white rounded-2 position-relative" action="/search" method="get">
				<input name="key" id="search-input" class="col-md-10 py-2 px-3 border-0 border-end rounded-start" type="text" placeholder="Nhập sản phẩm tìm kiếm...">
				<button type="submit" class="col-md-2 btn btn-light border-0 search-btn">Tìm kiếm</button>

				<div class="position-absolute bg-white p-3 rounded-2 search-hint" hidden>
					<h4 class="m-0"><strong>Sản phẩm gợi ý</strong></h4>
					<ul class="list-unstyled m-0"></ul>
				</div>
			</form>
		</div>
	</div>

	<div class="col-md-2 d-flex align-items-center justify-content-center">
		<?php if(isset($_SESSION['user']['id_customer'])): ?>
			<div class="d-flex align-items-center justify-content-center w-100">
				<div class="d-flex align-items-center justify-content-center position-relative logined-account">
					<div class="p-1">
						
					</div>
					<div class="p-1">
						<p class="m-0"><?php echo $htmlspecialchars($_SESSION['user']['username']) ?></p>
					</div>
					<div class="position-absolute bg-white rounded-2 overflow-hidden optional-account">
						<ul class="m-0 p-0 list-unstyled">
							<li>
								<a class="d-block py-3 px-4" href="/user/profile">Tài khoản của tôi</a>
							</li>
							<li>
								<a class="d-block py-3 px-4" href="/user/logout">Đăng xuất</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="row w-100 align-items-center justify-content-center account">
				<a id="sign-in" class="d-block col-md-6 m-0 pt-2 px-1 text-center text-decoration-none" href="/user/signin">Đăng nhập</a>
				<a id="sign-up" class="d-block col-md-6 m-0 pt-2 px-1 text-center text-decoration-none" href="/user/register">Đăng ký</a>
			</div>
		<?php endif ?>
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