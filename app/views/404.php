<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">

			<div class="text-center p-5 not-found-404">
				<?php 
					$uri = $_SERVER['REQUEST_URI'];
				?>
				<p class="m-0"><strong>KHÔNG TÌM THẤY ĐƯỜNG DẪN <?php echo "\"$uri\"" ?></strong></p>
				<a href="/" class="btn btn-outline-primary">
					<div>
						<i class="fa-solid fa-house"></i>
						<span>Về trang chủ</span>
					</div>
				</a>
			</div>

			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
