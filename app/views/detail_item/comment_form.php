<form id="comment-form" class="p-3 pb-4" method="post">
	<div class="row">
		<div class="col">
			<input 
				type="text" 
				name="comment_name" 
				class="form-control" 
				placeholder="Họ và tên của bạn"
				value="<?php echo isset($_SESSION['user']['id_customer']) ? $_SESSION['user']['name'] : '' ?>"
				<?php echo isset($_SESSION['user']['id_customer']) ? 'hidden' : '' ?>
			>
		</div>
		<div class="col">
			<input 
				type="text" 
				name="comment_phone_number" 
				class="form-control" 
				placeholder="Số điện thoại của bạn"
				value="<?php echo isset($_SESSION['user']['id_customer']) ? $_SESSION['user']['phone_number'] : '' ?>"
				<?php echo isset($_SESSION['user']['id_customer']) ? 'hidden' : '' ?>
			>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col">
			<textarea name="comment_content" class="form-control" rows="4" placeholder="Nội dung bình luận"></textarea>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col text-center">
			<button class="btn btn-fill-primary">Gửi</button>
		</div>
	</div>
</form>