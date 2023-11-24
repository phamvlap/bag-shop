<?php require_once __DIR__ . '/../../components/head.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../components/navbar.php' ?>

	<div class="d-flex flex-column align-items-center mt-5 additional-form">
		<h2 class="m-0">Thêm sản phẩm mới</h2>

		<!-- form add products -->
		<?php require_once __DIR__ . '/add_form.php' ?>

	</div>

</div>

<?php 
	purgeSESSION('old');
	purgeSESSION('errors');
?>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
