<?php require_once __DIR__ . '/../../components/head.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../components/navbar.php' ?>

	<div class="d-flex flex-column align-items-center mt-5 additional-form">
		<?php
			$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : false;
			$isEditing = strpos($uri, '/admin/product/edit/') !== false;

			if($isEditing) {
				echo '<h2 class="m-0"><strong>Cập nhật sản phẩm</strong></h2>';
			}
			else {
				echo '
				<div class="row w-100">
					<a href="/admin/product" class="d-block col col-md-2 d-flex align-items-center justify-content-center btn btn-light" style="font-size: 1.8rem">
						<i class="fa-regular fa-circle-left"></i>
						<span class="px-2">Quay lại</span>
					</a>
					<div class="col col-md-4 offset-md-2 d-flex align-items-center justify-content-center">
						<h2 class="m-0"><strong>Thông tin chi tiết sản phẩm</strong></h2>
					</div>
					<div class="col col-md-2 offset-md-2 text-end">
						<a href="/admin/product/edit/' . $htmlspecialchars($_SESSION['item']['id_product']) . '" class="btn btn-warning edit-btn">
							<i class="fa-solid fa-pen"></i>
							<span>Chỉnh sửa</span>
						</a>
					</div>
				</div>';
			}
		?>

		<!-- form edit items -->
		<?php require_once __DIR__ . '/detail_form.php'; ?>
		
	</div>

	<?php require_once __DIR__ . '/../../components/copyright.php'; ?>

</div>

<?php 
	purgeSESSION('form');
	purgeSESSION('old');
	purgeSESSION('errors');
?>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
