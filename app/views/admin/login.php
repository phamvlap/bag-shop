<?php require_once __DIR__ . '/../components/head.php'; ?>

<div class="container p-0">

	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
	        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
	    </symbol>
	</svg>

	<div class="container content">
		<div class="row p-3 rounded-2">
			<div class="col-md-6 offset-md-3 p-3">

				<!-- login with eligible admin -->
				<div id="admin-login" class="bg-white p-4 rounded-2 shadow-lg">
					
					<h2 class="m-0 text-center"><strong>Đăng nhập với tư cách admin</strong></h2>

					<?php if(isset($_SESSION['admin-errors'])): ?>
					    <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
					        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					        <div><strong>Email hoặc mật khẩu không chính xác</strong></div>
					    </div>
					<?php endif ?>

					<form id="admin-form" class="row g-3 p-3" method="post" action="/admin/login">
					    <div class="col-12">
					        <label for="admin-email" class="form-label fw-bold">Email (admin@gmail.com): </label>
					        <input 
					            name="admin-email" 
					            type="text" 
					            id="admin-email" 
					            class="form-control" 
					            placeholder="Nhập email"
					            value="<?php 
					                if(isset($_SESSION['form']['admin-email'])) {
					                    echo $_SESSION['form']['admin-email'];
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
							<label for="admin-password" class="form-label fw-bold">Mật khẩu (admin123): </label>
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

<?php
    purgeSESSION('form');
    purgeSESSION('admin-errors');
?>
	
</div>

<?php require_once __DIR__ . '/../components/foot.php'; ?>
