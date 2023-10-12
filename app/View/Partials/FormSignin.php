<h2 class="m-0 text-center">Đăng nhập</h2>
<?php
if($_SESSION['error-signin']) {
    echo <<<HTML
    <p class="fst-italic text-center m-0 mt-3 error-signin">Tên đăng nhập hoặc mật khẩu không đúng</p>
    HTML;
}
?>
<form id="form-signin" class="row g-3 p-3" method="post" action="/handler/signin.php">
    <div class="col-12">
        <label for="username" class="form-label fw-bold">Tên đăng nhập: </label>
        <input name="username" type="text" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
    </div>
	<div class="col-12">
		<label for="password" class="form-label fw-bold">Mật khẩu: </label>
		<input name="password" type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
	</div>
    <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
    </div>
    <div class="col-12 text-center p-0 mt-3">
        <span>Bạn lần đầu đến với <a href="/home">Good Store</a> ? </span>
        <a href="/signup">Đăng ký</a>
    </div>
</form>