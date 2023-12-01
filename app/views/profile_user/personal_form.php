<form action="/user/profile" method="post" class="mt-3 p-3">
	<div class="row mb-3">
    	<label for="name" class="col-sm-3 col-form-label fw-bold">Họ tên: </label>
    	<div class="col-sm-9">
      		<input 
      			name="name" 
      			type="text" 
      			id="name" 
      			class="form-control" 
      			value="<?php echo $htmlspecialchars($_SESSION['user']['name']) ?>"
  			>
    	</div>
  	</div>

  	<div class="row mb-3">
    	<label for="username" class="col-sm-3 col-form-label fw-bold">Tên đăng nhập: </label>
    	<div class="col-sm-9">
      		<input 
      		name="username" 
      		type="text" 
      		id="username" 
      		class="form-control" 
      		value="<?php echo $htmlspecialchars($_SESSION['user']['username']) ?>"
  		>
    	</div>
  	</div>

     <fieldset class="row mb-3">
		<legend class="col-form-label col-sm-3 pt-0 fw-bold">Giới tính: </legend>
		<div class="col-sm-9 row m-0">
			<div class="form-check col-md-2">
				<input 
					class="form-check-input" 
					id="male" 
					type="radio" 
					name="gender" 
					value="male" 
					<?php
						if($_SESSION['user']['gender'] === 'male') 
							echo "checked";
					?>
				>
				<label class="form-check-label" for="male">Nam</label>
			</div>
			<div class="form-check col-md-2">
				<input 
					class="form-check-input" 
					id="female" 
					type="radio" 
					name="gender" 
					value="female" 
					<?php
						if($_SESSION['user']['gender'] === 'female') 
							echo "checked";
					?>
				>
				<label class="form-check-label" for="female">Nữ</label>
			</div>
			<div class="form-check col-md-2">
				<input 
					class="form-check-input" 
					id="other" 
					type="radio" 
					name="gender" 
					value="other" 
					<?php
						if($_SESSION['user']['gender'] === 'other') 
							echo "checked";		
					?>
				>
				<label class="form-check-label" for="other">Khác</label>
			</div>
		</div>
	</fieldset>
	<div class="text-center">
		<button type="submit" class="px-4 border-0 fw-bold">Lưu</button>
	</div>
</form>