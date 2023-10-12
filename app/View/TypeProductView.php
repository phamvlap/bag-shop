<?php require_once __DIR__ . '/Partials/Head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/Partials/Header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<!-- Sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php
					require_once __DIR__ . '/Partials/Sidebar.php';
					Sidebar('Danh mục sản phẩm',
						[
							[1, 'Gạo, bột các loại'],
							[2, 'Mì ăn liền'],
							[3, 'Sữa các loại'],
							[4, 'Bánh kẹo các loại'],
							[5, 'Đồ ăn vặt'],
							[6, 'Đồ uống có cồn'],
							[7, 'Nước giải khát'],
							[8, 'Đồ dùng gia đình']
						]);
				?>
			</div>

			<div class="col-md-10 p-0">
				<div class="ms-2">
					<!-- Products -->
					<div id="products" class="row products px-1 mt-2">
						<?php
							require_once __DIR__ . '/Partials/Product.php';
							showProducts($data['products']);
						?>
					</div>

				</div>

				<!-- Footer -->
				<div id="footer" class="container mt-3 bg-white rounded-top-2">
					<?php require_once __DIR__ . '/Partials/Footer.php'; ?>
				</div>

			</div>
		</div>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/Partials/Foot.php'; ?>
