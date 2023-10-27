<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<h2 class="m-0 text-center"><strong>Đăng nhập</strong></h2>

<?php if(isset($_SESSION['failed'])): ?>
    <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div><?= getOnceSession('failed') ?></div>
    </div>
<?php endif ?>

<form id="form-signin" class="row g-3 p-3" method="post" action="/user/signin">
    <div class="col-12">
        <label for="username" class="form-label fw-bold">Tên đăng nhập: </label>
        <input 
            name="username" 
            type="text" 
            id="username" 
            class="form-control" 
            placeholder="Nhập tên đăng nhập"
            value="<?php 
                if(isset($_SESSION['form']['username'])) {
                    echo $_SESSION['form']['username'];
                }
            ?>"
        >
    </div>
	<div class="col-12">
		<label for="password" class="form-label fw-bold">Mật khẩu: </label>
		<input 
            name="password" 
            type="password" 
            id="password" 
            class="form-control" 
            placeholder="Nhập mật khẩu"
        >
	</div>
    <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
    </div>
    <div class="col-12 text-center p-0 mt-3">
        <span>Bạn lần đầu đến với <a href="/home"><?= APP_NAME ?></a> ? </span>
        <a href="/user/register">Đăng ký</a>
    </div>
</form>
    
<?php
    unset($_SESSION['form']);
?>