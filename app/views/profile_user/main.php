<div class="mt-4 p-4 personal-sector rounded-2">
	<h4 class="m-0">Thông tin cá nhân</h4>

	<?php 
		if(isset($_SESSION['status-personal']) && $_SESSION['status-personal']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-personal']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-personal']);
		}
		if(isset($_SESSION['status-personal']) && !$_SESSION['status-personal']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-personal']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-personal']);
		}
	?>

	<!-- load personal of user form -->
	<?php require_once __DIR__ . '/personal_form.php'; ?>

</div>

<div class="mt-4 p-4 password-sector rounded-2">
	<h4 class="m-0">Đổi mật khẩu</h4>

	<?php 
		if(isset($_SESSION['status-password']) && $_SESSION['status-password']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-password']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-password']);
		}
		if(isset($_SESSION['status-password']) && !$_SESSION['status-password']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-password']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-password']);
		}
	?>

	<!-- load change password form -->
	<?php require_once __DIR__ . '/change_pass_form.php'; ?>

</div>

<div class="mt-4 p-4 address-sector rounded-2">
	<h4 class="m-0">Thông tin liên hệ</h4>

	<?php 
		if(isset($_SESSION['status-address']) && $_SESSION['status-address']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-address']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-address']);
		}
		if(isset($_SESSION['status-address']) && !$_SESSION['status-address']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-address']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-address']);
		}
	?>

	<!-- load change password form -->
	<?php require_once __DIR__ . '/contact_form.php'; ?>

</div>