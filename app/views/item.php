<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<!-- sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php require_once __DIR__ . '/components/sidebar.php'; ?>
			</div>

			<div class="col-md-10 p-0">
				<div class="ms-2 mt-2">
					<!-- detail product -->
					<?php 
						$imgs = explode(';', $_SESSION['item']['images']);
					?>

					<div class="row me-0">
						<div class="col-md-8">
							<div class="row m-0 images-item">
								<div class="col col-md-2 p-0 pe-2 list-images-item position-relative" style="height: 420px">
									<div>
										<?php for($i = 0; $i < min(count($imgs), 4); ++$i): ?>
											<?php 
												$img = $imgs[$i];
												$activeClass = ($i === 0) ? 'active-image-item' : '';
											?>
											<img src="/uploads/<?= $img ?>" class="d-block w-100 rounded-2 mb-2 <?= $activeClass ?>" alt="..." height="100px">
										<?php endfor ?>
									</div>

									<div class="position-absolute top-0 w-100 d-flex justify-content-center mt-2">
										<div class="bg-secondary rounded-circle" hidden>
											<i class="fa-solid fa-chevron-up p-3"></i>
										</div>
									</div>

									<div class="position-absolute bottom-0 w-100 d-flex justify-content-center mb-3">
										<div class="bg-secondary rounded-circle" <?php echo (count($imgs) > 4) ? '' : 'hidden' ?>>
											<i class="fa-solid fa-chevron-down p-3"></i>
										</div>
									</div>

								</div>
								<div class="col col-md-10 p-0 ps-2 showing-image">
									<img src="/uploads/<?= $imgs[0] ?>" class="d-block w-100 rounded-2" alt="..." style="height: 420px">
								</div>
							</div>
							<div class="p-4 mt-3 bg-white describe">
								<h3 class="fw-bold">Mô tả sản phẩm</h3>
								<p class="p-0"><?= $_SESSION['item']['describes'] ?></p>
							</div>

							<div class="bg-white mx-0 mt-3 p-4 rounded-2 comment-container">
								<h3 class="fw-bold">Bình luận</h3>

								<div class="row">
									<form id="comment-form" class="p-3 pb-4" method="post">
										<div class="row">
											<div class="col">
												<input type="text" name="comment_name" class="form-control" placeholder="Họ và tên của bạn">
											</div>
											<div class="col">
												<input type="text" name="comment_phone_number" class="form-control" placeholder="Số điện thoại của bạn">
											</div>
										</div>
										<div class="row mt-3">
											<div class="col">
												<textarea name="comment_content" class="form-control" rows="4" placeholder="Nội dung bình luận"></textarea>
											</div>
										</div>
										<div class="row mt-4">
											<div class="col text-center">
												<button class="btn btn-fill-primary">Gửi</button>
											</div>
										</div>
									</form>
								</div>

								<?php for($i = 0; $i < count($_SESSION['item']['comments']); ++$i): ?>
									<?php
										$comment = $_SESSION['item']['comments'][$i];
										$date = explode(' ', $comment['created_at']);

										$hour = date('H:i', strtotime($date[1]));
										$day = date('d/m/Y', strtotime($date[0])); 
									?>
									<div class="row p-3 comment border-top <?= ($i >= 6) ? 'extra-comment' : '' ?>" <?= ($i >= 6) ? 'hidden' : '' ?>>
										<div class="col col-md-1 text-center">
											<i class="fa-regular fa-circle-user"></i>
										</div>
										<div class="col col-md-11">
											<h4 class="m-0"><strong>Người dùng</strong></h4>
											<p class="m-0 py-2"><?php echo $hour . ' ' . $day ?></p>
											<p class="m-0 mt-3"><?= $comment['content'] ?></p>
										</div>
									</div>
								<?php endfor ?>
								<div class="row">
									<div class="col col-md-12 text-center">
										<?php
											if(count($_SESSION['item']['comments']) >= 6) {
												echo '<span class="more-comments">Xem thêm...</span>';
											}
										?>
										<span class="less-comments" hidden>Thu gọn</span>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-4 p-0">
							<div class="p-4 bg-white rounded-2 detail-item">
								<h3 class="m-0"><?= $_SESSION['item']['name'] ?></h3>
								<div class="mt-4">
									<strong class="price"><?= $_SESSION['item']['price'] ?></strong>
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
										<strong class="tmp-price-item"><?= $_SESSION['item']['price'] ?></strong>
										<span>đ</span>
									</div>
								</div>
								<div class="row mt-5">
									<div class="text-center">
										<button class="btn btn-outline-primary add-item-btn">Thêm vào giỏ</button>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Footer -->
				<div id="footer" class="container mt-3 bg-white rounded-top-2">
					<?php require_once __DIR__ . '/components/footer.php'; ?>
				</div>

			</div>
		</div>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
