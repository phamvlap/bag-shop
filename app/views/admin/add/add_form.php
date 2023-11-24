<form class="mt-4 w-100" action="/admin/product/add" method="post" enctype="multipart/form-data">
	<div class="row mb-3">
		<label for="item-name" class="col-sm-2 col-form-label">Tên sản phẩm: </label>
		<div class="col-sm-10">
			<input 
				type="text" 
				name="item-name" 
				class="form-control" 
				id="item-name"
				value="<?php 
					if(isset($_SESSION['old']['item-name'])) {
						echo $htmlspecialchars($_SESSION['old']['item-name']);
					}
				?>"
			>
		</div>
		<div class="mt-2 error">
			<?php 
				if(isset($_SESSION['errors']['item-name'])) {
					echo $htmlspecialchars($_SESSION['errors']['item-name']);
				}
			?>
		</div>
	</div>
	<div class="row mb-3">
		<label for="item-desc" class="col-sm-2 col-form-label">Mô tả sản phẩm: </label>
		<div class="col-sm-10">
			<textarea 
				name="item-desc" 
				id="item-desc" 
				class="form-control" 
				cols="30" 
				rows="6"
			><?php 
					if(isset($_SESSION['old']['item-desc'])) {
						echo $htmlspecialchars($_SESSION['old']['item-desc']);
					}
				?></textarea>
		</div>
		<div class="mt-2 error">
			<?php 
				if(isset($_SESSION['errors']['item-desc'])) {
					echo $htmlspecialchars($_SESSION['errors']['item-desc']);
				}
			?>
		</div>
	</div>
	<div class="row mb-3">
		<label for="item-price" class="col-sm-2 col-form-label">Đơn giá: </label>
		<div class="col-sm-10">
			<input 
				type="text" 
				name="item-price" 
				class="form-control" 
				id="item-price"
				value="<?php 
					if(isset($_SESSION['old']['item-price'])) {
						echo $htmlspecialchars($_SESSION['old']['item-price']);
					}
				?>"
			>
		</div>
		<div class="mt-2 error">
			<?php 
				if(isset($_SESSION['errors']['item-price'])) {
					echo $htmlspecialchars($_SESSION['errors']['item-price']);
				}
			?>
		</div>
	</div>
	<div class="row mb-3">
		<label for="item-type" class="col-sm-2 col-form-label">Loại sản phẩm: </label>
		<div class="col-sm-10">
			<select id="item-type" name="item-type" class="form-select">
				<option value="0" selected>--Chọn--</option>
				<option 
					value="1"
					<?php 
						if((int)$_SESSION['old']['item-type'] === 1) 
							echo "selected"; 
						else echo '';
					?>
				>Túi du lịch</option>
				<option 
					value="2"
					<?php 
						if((int)$_SESSION['old']['item-type'] === 2) 
							echo "selected"; 
						else echo '';
					?>
				>Balo thời trang nam, nữ</option>
				<option 
					value="3"
					<?php 
						if((int)$_SESSION['old']['item-type'] === 3) 
							echo "selected"; 
						else echo '';
					?>
				>Túi chống sốc laptop</option>
				<option 
					value="4"
					<?php 
						if((int)$_SESSION['old']['item-type'] === 4) 
							echo "selected"; 
						else echo '';
					?>
				>Balo Laptop</option>
			</select>
		</div>
		<div class="mt-2 error">
			<?php 
				if(isset($_SESSION['errors']['item-type'])) {
					echo $htmlspecialchars($_SESSION['errors']['item-type']);
				}
			?>
		</div>
	</div>
	<div class="row mb-3">
		<label for="item-files" class="col-sm-2 col-form-label">Hình ảnh minh họa: </label>
		<div class="col-sm-10">
			<input type="file" name="item-files[]" multiple>
			<div class="row demo-imgs"></div>
		</div>
		<div class="mt-2 error">
			<?php 
				if(isset($_SESSION['errors']['item-files'])) {
					echo $htmlspecialchars($_SESSION['errors']['item-files']);
				}
			?>
		</div>
	</div>
	<div class="d-flex justify-content-center">
		<button type="submit" class="btn btn-fill-primary">Thêm</button>
	</div>
</form>