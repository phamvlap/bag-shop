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