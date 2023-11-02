<?php require_once __DIR__ . '/components/head.php'; ?>
<?php require_once __DIR__ . '/components/symbol.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container p-0 content">
		<div class="row m-0 cart">
			<div class="col col-md-10 offset-md-1 bg-white rounded-2">
				<h2 class="text-center m-0 p-3 cart-heading fw-bold">Xác nhận đặt hàng</h2>
				<!-- user -->
				<div class="p-3 cart-info-user">
					<?php $htmlspecialchars = 'htmlspecialchars' ?>

					<h3 class="m-0 px-4"><strong>Thông tin khách hàng:</strong></h3>

					<div class="row m-0 p-2 mt-4">
						<span class="col col-md-2 p-0">Họ tên: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['name']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Số điện thoại: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['phone_number']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Email: </span>
						<strong class="d-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['email']) ?></strong>
					</div>
					<div class="row m-0 p-2">
						<span class="col col-md-2 p-0">Địa chỉ: </span>
						<strong class="cold-block col col-md-10"><?php echo $htmlspecialchars($_SESSION['user']['address']) ?></strong>
					</div>
				</div>

				<!-- items -->
				<div class="p-3 cart-body preorder-body">
					<h3 class="m-0 px-4"><strong>Chi tiết sản phẩm:</strong></h3>

					<table class="table table-striped table-hover mt-4 border border-secondary">
						<thead>
							<tr class="table-light">
								<th scope="col" class="text-center">STT</th>
								<th scope="col" class="text-center">Sản phẩm</th>
								<th scope="col" class="text-center">Giá</th>
								<th scope="col" class="text-center">Số lượng</th>
								<th scope="col" class="text-center">Tổng tạm thời</th>
							</tr>
						</thead>

						<tbody>
							<?php $count = 1; ?>
							<?php foreach($_SESSION['rows'] as $row): ?>
								<tr>
									<td class="text-center">
										<?php 
											echo $count;
											++$count;
										?>
									</td>
									<td><?= $htmlspecialchars($row['name']) ?></td>
									<td class="text-center"><?= $row['price'] ?></td>
									<td class="text-center"><?= $row['count'] ?></td>
									<td class="text-center">
										<?php 
											$tmpTotal = $row['price'] * $row['count'];
											echo $tmpTotal;
										?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>

					<!-- cart payment -->
					<div class="row mx-0 mt-4 rounded-2 p-3">
						<div class="col col-md-6 offset-md-6 payment">
							<div class="row py-2">
								<p class="col col-md-8 m-0">Tổng thanh toán tạm thời: </p>
								<p class="col col-md-4 m-0 text-end">
									<span id="cart-tmp-total"><?= $_SESSION['total'] ?></span> 
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
									<span><?= $_SESSION['total'] ?></span> 
									<span>đ</span>
								</p>
							</div>
							<div class="text-center">
								<form action="/checkout" method="post">
									<button id="checkout-btn" class="btn btn-fill-primary order-btn">Đặt hàng</button>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<input 
	type="text" 
	name="status-order" 
	value="<?php
		if(isset($_SESSION['status-order'])) {
			if($_SESSION['status-order']) {
				echo 'success';	
			}
			else {
				echo 'failed';
			}
		}
	?>"
	hidden
>

<!-- Button trigger modal alert order -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alert-order" hidden></button>

<!-- Modal alert order -->
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

<!-- foot -->
<?php require_once __DIR__ . '/components/foot.php'; ?>
