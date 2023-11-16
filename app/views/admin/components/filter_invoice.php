<form action="/admin/invoice/filter" id="filter-invoices-form" class="row align-items-center" method="post">
	<h4 class="col col-md-1 m-0"><strong>Lọc theo:</strong></h4>

	<div class="col col-md-3">
		<div class="input-group">
			<label class="input-group-text" for="filter-invoice-date">Ngày lập: </label>
			<select class="form-select" id="filter-invoice-date" name="filter-invoice-date">
				<option value="none" selected>--Chọn--</option>
				<option 
					value="desc"
					<?php if(isset($_SESSION['request-filters']['created_at']) && $_SESSION['request-filters']['created_at'] === 'desc') echo 'selected'; else echo '';
					?>
				>Mới nhất</option>
				<option 
					value="asc"
					<?php if(isset($_SESSION['request-filters']['created_at']) && $_SESSION['request-filters']['created_at'] === 'asc') echo 'selected'; else echo '';
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
					<?php if(isset($_SESSION['request-filters']['total']) && $_SESSION['request-filters']['total'] === 'desc') echo 'selected'; else echo '';
					?>
				>Giảm dần</option>
				<option 
					value="asc"
					<?php if(isset($_SESSION['request-filters']['total']) && $_SESSION['request-filters']['total'] === 'asc') echo 'selected'; else echo '';
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
					<?php if(isset($_SESSION['request-filters']['status']) && (int)$_SESSION['request-filters']['status'] === 0) echo 'selected'; else echo '';
					?>
				>Đang chờ duyệt</option>
				<option 
					value="1"
					<?php if(isset($_SESSION['request-filters']['status']) && (int)$_SESSION['request-filters']['status'] === 1) echo 'selected'; else echo '';
					?>
				>Đã được duyệt</option>
			</select>
		</div>
	</div>
	<div class="col col-md-2 text-center">
		<button class="btn btn-fill-primary" style="padding-left: 10px; padding-right: 10px">Áp dụng</button>
	</div>

</form>