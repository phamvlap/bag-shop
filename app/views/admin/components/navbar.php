<nav class="navbar navbar-expand-lg navbar-light p-0">
	<div class="container-fluid px-5">
		<span class="navbar-text title px-2 py-0">
			Hệ thống quản lý cửa hàng <?= APP_NAME ?>
		</span>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
				<li class="nav-item">
					<a class="nav-link py-2 px-4" href="/admin/product">Quản lý sản phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-2 px-4" href="/admin/invoice">Quản lý đơn hàng</a>
				</li>
				<li class="nav-item px-4 admin-account position-relative">
					<?php
						if(!isset($_SESSION['admin'])) {
							echo '<a class="nav-link py-2 px-4" href="/admin">Đăng nhập</a>';
						}
						else {
							echo '
							<div class="row align-items-center h-100 logout-account-section">
								<div class="col col-md-2">
									<i class="fa-solid fa-user-gear"></i>
								</div>
								<div class="col col-md-10 px-1">
									<h4 class="m-0">' . $_SESSION['admin']['email'] . '</h4>
								</div>
								
								<div class="position-absolute top-100 bg-white shadow rounded-2 admin-logout">
									<p class="m-0">
										<a class="nav-link py-1 px-3 d-flex align-items-center" href="/admin/destroy" style="color: red">
											<i class="fa-solid fa-right-from-bracket"></i>
											<span class="ms-2">Đăng xuất</span>
										</a>
									</p>
								</div>
							</div>';
						}
					?>
				</li>
		 	</ul>

		</div>
	</div>
</nav>