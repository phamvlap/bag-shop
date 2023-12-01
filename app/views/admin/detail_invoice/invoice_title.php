<p class="m-0">
	<span style="font-size: 1.4rem">Đơn hàng được đặt vào lúc:</span>
	<?php
		$dateTime = explode(' ', $_SESSION['invoice']['created_at']);
		$day  = (int)date('w', strtotime($dateTime[0]));
		$dayOfWeek = retrieveDay(day: $day);

		echo  '<span style="font-size: 1.4rem" class="ps-1"><i>' . date('H:i',  strtotime($dateTime[1])) . ' ' . $dayOfWeek . ', ' . date('d/m/Y', strtotime($dateTime[0])) . '</i></span>';
	?>
</p>
<p class="m-0">
	<span style="font-size: 1.6rem">Trạng thái của đơn hàng: </span>
	<?php
		if((int)$_SESSION['invoice']['status'] === 1) {
			echo '<strong style="font-size: 1.6rem; color: green" class="ps-1">
				Đơn hàng đã được duyệt
				</strong>';
		}
		elseif((int)$_SESSION['invoice']['status'] === -1) {
			echo '<strong style="font-size: 1.6rem; color: red" class="ps-1">
				Đơn hàng đã hủy
				</strong>';
		}
		elseif((int)$_SESSION['invoice']['status'] === 0) {
			echo '<strong style="font-size: 1.6rem; color: orange" class="ps-1">
				Đơn hàng đang chờ duyệt
				</strong>';
		}
	?>
</p>