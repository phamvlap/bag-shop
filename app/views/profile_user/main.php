<div class="mt-4 p-4 personal-sector rounded-2">
	<h4 class="m-0">Thông tin cá nhân</h4>

	<?php 
		if(isset($_SESSION['status-personal']) && $_SESSION['status-personal']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-personal']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-personal']);
		}
		if(isset($_SESSION['status-personal']) && !$_SESSION['status-personal']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-personal']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-personal']);
		}
	?>

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
</div>

<div class="mt-4 p-4 password-sector rounded-2">
	<h4 class="m-0">Đổi mật khẩu</h4>

	<?php 
		if(isset($_SESSION['status-password']) && $_SESSION['status-password']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-password']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-password']);
		}
		if(isset($_SESSION['status-password']) && !$_SESSION['status-password']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-password']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-password']);
		}
	?>

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
</div>

<div class="mt-4 p-4 address-sector rounded-2">
	<h4 class="m-0">Thông tin liên hệ</h4>

	<?php 
		if(isset($_SESSION['status-address']) && $_SESSION['status-address']['status']) {
			echo '
			<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-address']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-address']);
		}
		if(isset($_SESSION['status-address']) && !$_SESSION['status-address']['status']) {
			echo '
			<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
				<strong>' . $_SESSION['status-address']['message'] . '</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			unset($_SESSION['status-address']);
		}
	?>

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
</div>