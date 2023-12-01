<form action="/user/profile" method="post" class="mt-3 p-3">
	<div class="row mb-3">
    	<label for="current-password" class="col-sm-3 col-form-label fw-bold">Nhập mật khẩu hiện tại: </label>
    	<div class="col-sm-9">
      		<input 
      			name="current-password" 
      			type="password" 
      			id="current-password" 
      			class="form-control"
  			>
    	</div>
  	</div>

  	<div class="row mb-3">
    	<label for="new-password" class="col-sm-3 col-form-label fw-bold">Nhập mật khẩu mới: </label>
    	<div class="col-sm-9">
      		<input 
	      		name="new-password" 
	      		type="password" 
	      		id="new-password" 
	      		class="form-control"
      		>
    	</div>
  	</div>

  	<div class="row mb-3">
    	<label for="repeat-password" class="col-sm-3 col-form-label fw-bold">Nhập lại mật khẩu mới: </label>
    	<div class="col-sm-9">
      		<input 
      			name="repeat-password" 
      			type="password" 
      			id="repeat-password"
      			class="form-control"
      		>
    	</div>
  	</div>
  	<div class="text-center">
		<button type="submit" class="px-4 border-0 fw-bold">Lưu</button>
	</div>
</form>