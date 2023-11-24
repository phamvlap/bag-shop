<?php require_once __DIR__ . '/../components/head.php'; ?>
<?php require_once __DIR__ . '/../components/symbol.php'; ?>

<div class="container p-0">

	<?php require_once __DIR__ . '/components/navbar.php' ?>

	<div class="content">
		<div class="row p-3 rounded-2">
			<div class="col-md-6 offset-md-3 p-3">

				<!-- login with eligible admin -->
				<div id="admin-login" class="bg-white p-4 rounded-2 shadow-lg">
					
					<h2 class="m-0 text-center"><strong>Đăng nhập với tư cách admin</strong></h2>

					<?php 
						if(isset($_SESSION['admin-errors'])) {
							echo '<div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
						        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						        <div><strong>Email hoặc mật khẩu không chính xác</strong></div>
						    </div>';
						}
					?>

					<form id="admin-form" class="row g-3 p-3" method="post" action="/admin/login">
					    <div class="col-12">
					        <label for="admin-email" class="form-label fw-bold">Email: </label>
					        <input 
					            name="admin-email" 
					            type="text" 
					            id="admin-email" 
					            class="form-control" 
					            placeholder="Nhập email"
					            value="<?php 
					                if(isset($_SESSION['form']['admin-email'])) {
					                    echo $htmlspecialchars($_SESSION['form']['admin-email']);
					                }
					            ?>"
					        >
					        <?php if(isset($_SESSION['admin-errors']['admin-email'])): ?>
						        <div class="error text-center mt-2">
							    	<?= $htmlspecialchars($_SESSION['admin-errors']['admin-email']) ?>
							    </div>
							<?php endif ?>
					    </div>

						<div class="col-12">
							<label for="admin-password" class="form-label fw-bold">Mật khẩu: </label>
							<input 
					            name="admin-password" 
					            type="password" 
					            id="admin-password" 
					            class="form-control" 
					            placeholder="Nhập mật khẩu"
					        >
					        <?php if(isset($_SESSION['admin-errors']['admin-password'])): ?>
						        <div class="error text-center mt-2">
							    	<?= $htmlspecialchars($_SESSION['admin-errors']['admin-password']) ?>
							    </div>
							<?php endif ?>
						</div>
					    <div class="col-12 text-center mt-5">
					        <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
					    </div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<?php require_once __DIR__ . '/../components/copyright.php'; ?>

<?php
    purgeSESSION('form');
    purgeSESSION('admin-errors');
?>
	
</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>
