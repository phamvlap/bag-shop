<form action="/user/profile" method="post" class="mt-3 p-3">
	<div class="row mb-3">
    	<label for="phone_number" class="col-sm-3 col-form-label fw-bold">Số điện thoại: </label>
    	<div class="col-sm-9">
      		<input name="phone_number" type="text" id="phone_number" class="form-control" value="<?php echo $htmlspecialchars($_SESSION['user']['phone_number']) ?>">
    	</div>
  	</div>

  	<div class="row mb-3">
    	<label for="email" class="col-sm-3 col-form-label fw-bold">
    	Email: </label>
    	<div class="col-sm-9">
      		<input name="email" type="text" id="email" class="form-control" value="<?php echo $htmlspecialchars($_SESSION['user']['email']) ?>">
    	</div>
  	</div>

  	<div class="row mb-3">
    	<label for="address" class="col-sm-3 col-form-label fw-bold">Địa chỉ: </label>
    	<div class="col-sm-9">
      		<input name="address" type="text" id="address" class="form-control" value="<?php echo $htmlspecialchars($_SESSION['user']['address']) ?>">
    	</div>
  	</div>
  	<div class="text-center">
		<button type="submit" class="px-4 border-0 fw-bold">Lưu</button>
	</div>
</form>