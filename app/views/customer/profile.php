<?php require_once __DIR__ . '/../components/head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/../components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">	
			<div id="profile-user" class="row bg-white m-0 p-3">
				<?php require_once __DIR__ . '/../components/customer/sidebar.php'; ?>

				<div class="col col-md-9 p-3">
					<h3 class="m-0">Thông tin tài khoản</h3>

					<?php require_once __DIR__ . '/../components/customer/content.php'; ?>

				</div>
			</div>
			<!-- Footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/../components/footer.php'; ?>
			</div>
		</div>
	</div>
	
</div>

<input type="hidden" id="is-updated" value="<?php echo $_SESSION['update-user']['status']?>">

<?php unset($_SESSION['update-user']) ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#informEditUser" hidden></button>

<!-- Modal -->
<div class="modal fade" id="informEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body"></div>
			<div class="modal-footer">
				<a href="/user" type="button" class="btn btn-fill-primary close">Đóng</a>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>

