<?php require_once __DIR__ . '/../components/head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/../components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row p-3 rounded-2">
			<div class="col-md-6 offset-md-3 p-3">
				<div id="signup" class="bg-white p-4 rounded-2 shadow-lg">
					<?php require_once __DIR__ . '/../components/form/signin_form.php'; ?>
				</div>

			</div>
		</div>
	</div>

	<div id="footer" class="container mt-3 bg-white rounded-top-2">
		<?php require_once __DIR__ . '/../components/footer.php'; ?>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>