<?php 
	$filters = [];

	$filters['filter-invoice-date'] = isset($_GET['filter-invoice-date']) ? $_GET['filter-invoice-date'] : false;
	$filters['filter-invoice-total'] = isset($_GET['filter-invoice-total']) ? $_GET['filter-invoice-total'] : false;
	$filters['filter-invoice-status'] = isset($_GET['filter-invoice-status']) ? $_GET['filter-invoice-status'] : false;
?>

<form action="/admin/invoice/filter" id="filter-invoices-form" class="row align-items-center" method="get">
	<h4 class="col col-md-1 m-0"><strong>Lọc theo:</strong></h4>

	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-invoice-date">Ngày lập: </label>
			<select class="form-select" id="filter-invoice-date" name="filter-invoice-date">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="desc"
					<?php if(isset($filters['filter-invoice-date']) && $filters['filter-invoice-date'] === 'desc') echo 'selected'; else echo '';
					?>
				>Mới nhất</option>
				<option 
					value="asc"
					<?php if(isset($filters['filter-invoice-date']) && $filters['filter-invoice-date'] === 'asc') echo 'selected'; else echo '';
					?>
				>Cũ nhất</option>
			</select>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-invoice-total">Tổng tiền: </label>
			<select class="form-select" id="filter-invoice-total" name="filter-invoice-total">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="desc"
					<?php if(isset($filters['total']) && $filters['total'] === 'desc') echo 'selected'; else echo '';
					?>
				>Giảm dần</option>
				<option 
					value="asc"
					<?php if(isset($filters['total']) && $filters['total'] === 'asc') echo 'selected'; else echo '';
					?>
				>Tăng dần</option>
			</select>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-invoice-status">Trạng thái: </label>
			<select class="form-select" id="filter-invoice-status" name="filter-invoice-status">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="0"
					<?php if(isset($filters['status']) && (int)$filters['status'] === 0) echo 'selected'; else echo '';
					?>
				>Đang chờ duyệt</option>
				<option 
					value="1"
					<?php if(isset($filters['status']) && (int)$filters['status'] === 1) echo 'selected'; else echo '';
					?>
				>Đã được duyệt</option>
				<option 
					value="-1"
					<?php if(isset($filters['status']) && (int)$filters['status'] === -1) echo 'selected'; else echo '';
					?>
				>Đã hủy</option>
			</select>
		</div>
	</div>
	<div class="col col-md-2 text-center">
		<button class="btn btn-fill-primary" style="padding-left: 10px; padding-right: 10px">Áp dụng</button>
	</div>

</form>