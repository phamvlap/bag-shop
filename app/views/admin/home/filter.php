<?php 
	$filters = [];

	$filters['filter-type'] = isset($_GET['filter-type']) ? $_GET['filter-type'] : false;
	$filters['filter-price'] = isset($_GET['filter-price']) ? $_GET['filter-price'] : false;
	$filters['filter-updated_at'] = isset($_GET['filter-date']) ? $_GET['filter-date'] : false;
?>

<form action="/admin/product/filter" id="filter-products-form" class="row align-items-center" method="get">
	<h4 class="col col-md-1 m-0"><strong>Lọc theo:</strong></h4>

	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-type">Loại sản phẩm: </label>
			<select class="form-select" id="filter-type" name="filter-type">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="1"
					<?php 
						if(isset($filters['filter-type']) && (int)$filters['filter-type'] === 1) 
							echo "selected"; 
						else echo '';
					?>
				>Túi du lịch</option>
				<option 
					value="2"
					<?php 
						if(isset($filters['filter-type']) && (int)$filters['filter-type'] === 2) 
							echo "selected"; 
						else echo '';
					?>
				>Balo thời trang nam, nữ</option>
				<option 
					value="3"
					<?php 
						if(isset($filters['filter-type']) && (int)$filters['filter-type'] === 3) 
							echo "selected"; 
						else echo '';
					?>
				>Túi chống sốc laptop</option>
				<option 
					value="4"
					<?php 
						if(isset($filters['filter-type']) && (int)$filters['filter-type'] === 4) 
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
						if(isset($filters['filter-price']) && $filters['filter-price'] === 'desc') 
							echo "selected"; 
						else echo '';
					?>
				>Từ cao đến thấp</option>
				<option 
					value="asc"
					<?php 
						if(isset($filters['filter-price']) && $filters['filter-price'] === 'asc') 
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
						if(isset($filters['filter-updated_at']) && $filters['filter-updated_at'] === 'desc') 
							echo "selected"; 
						else echo '';
					?>
				>Mới nhất</option>
				<option 
					value="asc"
					<?php 
						if(isset($filters['filter-updated_at']) && $filters['filter-updated_at'] === 'asc') 
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