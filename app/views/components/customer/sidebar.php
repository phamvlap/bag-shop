<div class="col col-md-3 p-3">
	<h3 class="m-0 text-center"><strong><?php echo htmlspecialchars($_SESSION['user']['username']) ?></strong></h3>
	<ul class="list-unstyled m-0 mt-4">
		<li>
			<a href="/user/profile" class="d-block p-2 rounded-2">Thông tin tài khoản</a>
		</li>
		<li class="mt-1">
			<a href="/user/history-order" class="d-block p-2 rounded-2">Đơn hàng của tôi</a>
		</li>
	</ul>
</div>