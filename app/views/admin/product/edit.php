<?php require_once __DIR__ . '/../../components/head.php'; ?>

<div id="admin-home" class="container p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../components/navbar.php' ?>

	<div class="d-flex flex-column align-items-center mt-5 additional-form">
		<?php
			$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : false;
			$isEditing = strpos($uri, '/admin/product/edit/') !== false;

			if($isEditing) {
				echo '<h2 class="m-0"><strong>Cập nhật sản phẩm</strong></h2>';
			}
			else {
				echo '
				<div class="row w-100">
					<a href="/admin/product" class="d-block col col-md-2 d-flex align-items-center justify-content-center btn btn-light" style="font-size: 1.8rem">
						<i class="fa-regular fa-circle-left"></i>
						<span class="px-2">Quay lại</span>
					</a>
					<div class="col col-md-4 offset-md-2 d-flex align-items-center justify-content-center">
						<h2 class="m-0"><strong>Thông tin chi tiết sản phẩm</strong></h2>
					</div>
					<div class="col col-md-2 offset-md-2 text-end">
						<a href="/admin/product/edit/' . $htmlspecialchars($_SESSION['item']['id_product']) . '" class="btn btn-warning edit-btn">
							<i class="fa-solid fa-pen"></i>
							<span>Chỉnh sửa</span>
						</a>
					</div>
				</div>';
			}
		?>

		<form class="mt-4 w-100" action="/admin/product/edit/<?= $_SESSION['item']['id_product'] ?>" method="post" enctype="multipart/form-data">
			<div 
				class="row mb-3" 
				<?php 
					echo $isEditing ? 'hidden' : '';
				?>
			>
				<label for="" class="col-sm-2 col-form-label">Lần cập nhật mới nhất: </label>
				<div class="col-sm-10">
					<input 
						type="text" 
						class="form-control" 
						value="<?php
							$date = explode(' ', $_SESSION['item']['updated_at']);
							echo $date[1] . ' ' . $htmlspecialchars(date('d-m-Y', strtotime($date[0])));
						?>" 
						disabled 
						readonly
					>
				</div>
			</div>
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
							else {
								echo $htmlspecialchars($_SESSION['item']['name']);
							}
						?>" 
						<?php 
							echo $isEditing ? '' : ' disabled readonly';
						?>
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
						<?php 
							echo $isEditing ? '' : ' disabled readonly';
						?>
					><?php 
						if(isset($_SESSION['old']['item-desc'])) {
							echo $htmlspecialchars($_SESSION['old']['item-desc']);
						}
						else {
							echo $htmlspecialchars($_SESSION['item']['describes']);
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
							else {
								echo $htmlspecialchars($_SESSION['item']['price']);
							}
						?>"
						<?php 
							echo $isEditing ? '' : ' disabled readonly';
						?>
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
					<select 
						id="item-type" 
						name="item-type" 
						class="form-select" 
						<?php 
							echo $isEditing ? '' : ' disabled readonly';
						?>
					>
						<option value="0" selected>--Chọn--</option>
						<option 
							value="1"
							<?php 
								if(isset($_SESSION['old']['item-type'])) {
									if((int)$_SESSION['old']['item-type'] === 1) 
										echo "selected"; 
									else echo '';
								}
								else {
									if((int)$_SESSION['item']['type'] === 1) 
										echo "selected"; 
									else echo '';
								}
							?>
						>Túi du lịch</option>
						<option 
							value="2"
							<?php 
								if(isset($_SESSION['old']['item-type'])) {
									if((int)$_SESSION['old']['item-type'] === 2) 
										echo "selected"; 
									else echo '';
								}
								else {
									if((int)$_SESSION['item']['type'] === 2) 
										echo "selected"; 
									else echo '';
								}
							?>
						>Balo thời trang nam, nữ</option>
						<option 
							value="3"
							<?php 
								if(isset($_SESSION['old']['item-type'])) {
									if((int)$_SESSION['old']['item-type'] === 3) 
										echo "selected"; 
									else echo '';
								}
								else {
									if((int)$_SESSION['item']['type'] === 3) 
										echo "selected"; 
									else echo '';
								}
							?>
						>Túi chống sốc laptop</option>
						<option 
							value="4"
							<?php 
								if(isset($_SESSION['old']['item-type'])) {
									if((int)$_SESSION['old']['item-type'] === 4) 
										echo "selected"; 
									else echo '';
								}
								else {
									if((int)$_SESSION['item']['type'] === 4) 
										echo "selected"; 
									else echo '';
								}
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
					<input 
						type="file" 
						name="item-files[]" 
						value="<?= $htmlspecialchars($_SESSION['item']['images']) ?>"
						multiple
						<?php 
							echo $isEditing ? '' : 'hidden';
						?>
					>
					<div class="row demo-imgs">
						<?php 
							$imgs = explode(';', $_SESSION['item']['images']);
							foreach($imgs as $img) {
								echo '
								<div class="col col-md-2 mt-2">
									<img src="/uploads/' . $img . '" width="100%" alt="">
								</div>';
							}
						?>
					</div>
				</div>
				<div class="mt-2 error">
					<?php 
					if(isset($_SESSION['errors']['item-files'])) {
						echo $htmlspecialchars($_SESSION['errors']['item-files']);
					}
					?>
				</div>
			</div>
			<div 
				class="b-3 text-center mt-5" 
				<?php 
					echo $isEditing ? '' : 'hidden';
				?>
			>
				<button type="submit" class="btn btn-fill-primary">Cập nhật</button>
			</div>
		</form>
	</div>

	<?php require_once __DIR__ . '/../../components/copyright.php'; ?>

</div>

<?php 
	purgeSESSION('form');
	purgeSESSION('old');
	purgeSESSION('errors');
?>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
