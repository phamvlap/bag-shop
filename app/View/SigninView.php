<?php require_once __DIR__ . '/Partials/Head.php'; ?>

<div class="container p-0">
	<!-- Header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/Partials/Header.php'; ?>
	</div>

	<div class="container content">
		<div class="row bg-color-primary p-3 rounded-2">
			<div class="col-md-6 offset-md-3 p-3">
				<div id="signin" class="bg-white p-4 rounded-2">
					<?php require_once __DIR__ . '/Partials/FormSignin.php'; ?>
				</div>

			</div>
		</div>
	</div>

	<div id="footer" class="container mt-3 bg-white rounded-top-2">
		<?php require_once __DIR__ . '/Partials/Footer.php'; ?>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/Partials/Foot.php'; ?>
