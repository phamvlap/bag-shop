<h2 class="m-0 text-center fw-bold">Đăng ký</h2>
<form id="form-signup" class="row g-3 p-3" method="post" action="/handler/signup.php">
    <div class="form-group col-12">
        <label for="name" class="form-label fw-bold">Họ tên: </label>
        <input name="name" type="text" id="name" class="form-control" placeholder="Nhập họ tên của bạn">
    </div>
    <div class="form-group col-12">
        <label for="username" class="form-label fw-bold">Tên đăng nhập: </label>
        <input name="username" type="text" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
    </div>
    <div class="form-group col-12">
        <label for="phone-number" class="form-label fw-bold">Số điện thoại: </label>
        <input name="phone_number" type="text" id="phone-number" class="form-control" placeholder="Nhập số điện thoại">
    </div>
    <div class="form-group col-12">
        <label for="password" class="form-label fw-bold">Mật khẩu: </label>
        <input name="password" type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
    </div>
    <div class="form-group col-12">
        <label for="confirm-pwd" class="form-label fw-bold">Nhập lại mật khẩu: </label>
        <input name="confirm_pwd" type="password" id="confirm-pwd" class="form-control" placeholder="Nhập lại mật khẩu">
    </div>
    <div class="form-group col-12">
        <div class="form-check">
            <input name="agree" class="form-check-input form-control" type="checkbox" id="agree-policy">
            <label class="form-check-label" for="agree-policy">
                Tôi đồng ý trở thành Thành viên 
                <a href="/home">Good Store</a>
                 và chấp nhận các Điều khoản & Điều kiện và Chính sách bảo mật của Good Store.
            </label>
        </div>
    </div>
    <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-outline-primary">Đăng ký</button>
    </div>
    <div class="col-12 text-center p-0 mt-3">
        <span>Bạn đã là thành viên của Good Store ? </span>
        <a href="/signin">Đăng nhập</a>
    </div>
</form>