<?php require_once __DIR__ . '/../symbol.php'; ?>

<h2 class="m-0 text-center"><strong>Đăng nhập</strong></h2>

<?php 
    if(isset($_SESSION['failed'])) {
        echo '
        <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>' . getOnceSession('failed') . '</div>
        </div>';
    }
?>

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