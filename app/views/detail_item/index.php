<?php require_once __DIR__ . '/../components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div class="container fixed-top">
		<?php require_once __DIR__ . '/../components/header.php'; ?>
	</div>

	<!-- id current user -->
	<input type="text" name="current-user" value="<?php echo isset($_SESSION['user']['id_customer']) ? $_SESSION['user']['id_customer'] : '' ?>" hidden>

	<div class="container content">
		<div class="row">
			<!-- sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php require_once __DIR__ . '/../components/sidebar.php'; ?>
			</div>

			<div class="col-md-10 p-0">
				<div class="ms-2 mt-2">
					<!-- detail product -->
					<div class="row me-0">
						<div class="col-md-8">
							<div class="row m-0 images-item">
								<!-- images section -->
								<?php require_once __DIR__ . '/images_section.php' ?>
								
							</div>
							<div class="p-4 mt-3 bg-white describe">
								<h3 class="fw-bold color-heading">Mô tả sản phẩm</h3>
								<p class="p-0"><?= $htmlspecialchars($_SESSION['item']['describes']) ?></p>
							</div>

							<div class="bg-white mx-0 mt-3 p-4 rounded-2 comment-container">
								<h3 class="fw-bold color-heading">Bình luận</h3>

								<div class="row">
									<!-- comment form -->
									<?php require_once __DIR__ . '/comment_form.php'; ?>

								</div>

								<?php for($i = 0; $i < count($_SESSION['item']['comments']); ++$i): ?>
									<?php
										$comment = $_SESSION['item']['comments'][$i];
										$date = explode(' ', $comment['created_at']);

										$hour = date('H:i', strtotime($date[1]));
										$day = date('d/m/Y', strtotime($date[0])); 
									?>
									<div class="row p-3 comment border-top <?= ($i >= 6) ? 'extra-comment' : '' ?>" <?= ($i >= 6) ? 'hidden' : '' ?>>
										<input type="text" value="<?= $comment['id_comment'] ?>" hidden>
										<div class="col col-md-1 text-center">
											<i class="fa-regular fa-circle-user"></i>
										</div>
										<div class="col col-md-11">
											<h4 class="m-0"><strong><?= $htmlspecialchars($comment['user_name']) ?></strong></h4>
											<p class="m-0 py-2"><?php echo $hour . ' ' . $day ?></p>
											<p class="m-0 mt-3"><?= $htmlspecialchars($comment['content']) ?></p>
											<p class="m-0 mt-3">
												<span class="like-comment-btn">
													<i class="fa-regular fa-thumbs-up"></i>
													<span>Thích</span>
													<span>(</span>
													<span class="liked-count">
														<?php
															echo "{$comment['liked_count']}";
														?>
													</span>
													<span>)</span>
												</span>
											</p>
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
							<!-- order section -->
							<?php require_once __DIR__ . '/order_section.php' ?>

						</div>
					</div>

				</div>

				<!-- footer -->
				<div id="footer" class="container mt-3 bg-white rounded-top-2">
					<?php require_once __DIR__ . '/../components/footer.php'; ?>
				</div>

			</div>
		</div>
	</div>
		
</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>
