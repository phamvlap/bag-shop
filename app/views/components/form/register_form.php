<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<h2 class="m-0 text-center fw-bold">Đăng ký</h2>

<input 
    type="text" 
    id="success-register" 
    value="<?php
        if(isset($_SESSION['success'])) {
            echo 'success';
        }
    ?>"
    hidden
>

<?php if(isset($_SESSION['old'])): ?>
    <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div><?= getOnceSession('failed') ?></div>
    </div>
<?php endif ?>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
        <div><?= getOnceSession('success') ?></div>
    </div>
<?php endif ?>

<?php $htmlspecialchars = 'htmlspecialchars' ?>

<form id="form-signup" class="row g-3 p-3" method="post" action="/user/register">
    <div class="form-group col-12">
        <label for="name" class="form-label fw-bold">Họ tên: </label>
        <input 
            name="name" 
            type="text" 
            id="name" 
            class="form-control" 
            placeholder="Nhập họ tên của bạn"
            value="<?php 
                if($_SESSION['old']){
                    echo $htmlspecialchars($_SESSION['old']['name']);
                }
                elseif($_SESSION['new']) {
                    echo $htmlspecialchars($_SESSION['new']['name']);
                }
            ?>"
            <?php 
                if($_SESSION['new']) {
                    echo 'disabled';
                } 
            ?>
        >
    </div>
    <div class="form-group col-12">
        <label for="username" class="form-label fw-bold">Tên đăng nhập: </label>
        <input 
            name="username" 
            type="text" 
            id="username" 
            class="form-control" 
            placeholder="Nhập tên đăng nhập"
            value="<?php 
                if($_SESSION['old']){
                    echo $htmlspecialchars($_SESSION['old']['username']);
                }
                elseif($_SESSION['new']) {
                    echo $htmlspecialchars($_SESSION['new']['username']);
                }
            ?>"
            <?php 
                if($_SESSION['new']) {
                    echo 'disabled';
                } 
            ?>
        >
    </div>
    <div class="form-group col-12">
        <label for="phone-number" class="form-label fw-bold">Số điện thoại: </label>
        <input 
            name="phone_number" 
            type="text" 
            id="phone-number" 
            class="form-control" 
            placeholder="Nhập số điện thoại"
            value="<?php 
                if($_SESSION['old']){
                    echo $htmlspecialchars($_SESSION['old']['phone_number']);
                }
                elseif($_SESSION['new']) {
                    echo $htmlspecialchars($_SESSION['new']['phone_number']);
                }
            ?>"
            <?php 
                if($_SESSION['new']) {
                    echo 'disabled';
                } 
            ?>
        >
    </div>
    <div class="form-group col-12">
        <label for="password" class="form-label fw-bold">Mật khẩu: </label>
        <input 
            name="password" 
            type="password" 
            id="password" 
            class="form-control" 
            placeholder="Nhập mật khẩu"
            value="<?php 
                if($_SESSION['old']){
                    echo $htmlspecialchars($_SESSION['old']['password']);
                }
                elseif($_SESSION['new']) {
                    echo $htmlspecialchars($_SESSION['new']['password']);
                }
            ?>"
            <?php 
                if($_SESSION['new']) {
                    echo 'disabled';
                } 
            ?>
        >
    </div>
    <div class="form-group col-12">
        <label for="confirm-pwd" class="form-label fw-bold">Nhập lại mật khẩu: </label>
        <input 
            name="confirm_pwd" 
            type="password" 
            id="confirm-pwd" 
            class="form-control" 
            placeholder="Nhập lại mật khẩu"
            value="<?php 
                if($_SESSION['old']){
                    echo $htmlspecialchars($_SESSION['old']['password']);
                }
                elseif($_SESSION['new']) {
                    echo $htmlspecialchars($_SESSION['new']['password']);
                }
            ?>"
            <?php 
                if($_SESSION['new']) {
                    echo 'disabled';
                } 
            ?>
        >
    </div>
    <div class="form-group col-12">
        <div class="form-check">
            <input 
                name="agree" 
                class="form-check-input form-control" 
                type="checkbox" 
                id="agree-policy"
                <?php 
                    if($_SESSION['new']) {
                        echo 'checked';
                    } 
                ?>
            >
            <label class="form-check-label" for="agree-policy">
                Tôi đồng ý trở thành thành viên của 
                <a href="/home">
                    <?= APP_NAME ?>
                </a>
                 và chấp nhận các Điều khoản & Điều kiện và Chính sách bảo mật của  <?= APP_NAME ?>
            </label>
        </div>
    </div>
    <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-outline-primary">Đăng ký</button>
    </div>
    <div class="col-12 text-center p-0 mt-3">
        <span>Bạn đã là thành viên của <?= APP_NAME ?> ? </span>
        <a href="/user/signin">Đăng nhập</a>
    </div>
</form>

<?php 
    if(isset($_SESSION['old'])) {
        unset($_SESSION['old']);
    }
    if(isset($_SESSION['new'])) {
        unset($_SESSION['new']);
    }
?>
