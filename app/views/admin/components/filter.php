<form action="/admin/product/filter" id="filter-products-form" class="row align-items-center" method="post">
	<h4 class="col col-md-1 m-0"><strong>Lọc theo:</strong></h4>

	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-type">Loại sản phẩm: </label>
			<select class="form-select" id="filter-type" name="filter-type">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="1"
					<?php 
						if(isset($_SESSION['filter-type']) && (int)$_SESSION['filter-type'] === 1) 
							echo "selected"; 
						else echo '';
					?>
				>Túi du lịch</option>
				<option 
					value="2"
					<?php 
						if(isset($_SESSION['filter-type']) && (int)$_SESSION['filter-type'] === 2) 
							echo "selected"; 
						else echo '';
					?>
				>Balo thời trang nam, nữ</option>
				<option 
					value="3"
					<?php 
						if(isset($_SESSION['filter-type']) && (int)$_SESSION['filter-type'] === 3) 
							echo "selected"; 
						else echo '';
					?>
				>Túi chống sốc laptop</option>
				<option 
					value="4"
					<?php 
						if(isset($_SESSION['filter-type']) && (int)$_SESSION['filter-type'] === 4) 
							echo "selected"; 
						else echo '';
					?>
				>Balo Laptop</option>
			</select>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-price">Giá: </label>
			<select class="form-select" id="filter-price" name="filter-price">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="desc"
					<?php 
						if(isset($_SESSION['filter-price']) && $_SESSION['filter-price'] === 'desc') 
							echo "selected"; 
						else echo '';
					?>
				>Từ cao đến thấp</option>
				<option 
					value="asc"
					<?php 
						if(isset($_SESSION['filter-price']) && $_SESSION['filter-price'] === 'asc') 
							echo "selected"; 
						else echo '';
					?>
				>Từ thấp đến cao</option>
			</select>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-date">Ngày cập nhật: </label>
			<select class="form-select" id="filter-date" name="filter-date">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="desc"
					<?php 
						if(isset($_SESSION['filter-date']) && $_SESSION['filter-date'] === 'desc') 
							echo "selected"; 
						else echo '';
					?>
				>Mới nhất</option>
				<option 
					value="asc"
					<?php 
						if(isset($_SESSION['filter-date']) && $_SESSION['filter-date'] === 'asc') 
							echo "selected"; 
						else echo '';
					?>
				>Cũ nhất</option>
			</select>
		</div>
	</div>
	<div class="col col-md-2 text-center">
		<button class="btn btn-fill-primary" style="padding-left: 10px; padding-right: 10px">Áp dụng</button>
	</div>

</form>