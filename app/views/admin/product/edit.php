<?php require_once __DIR__ . '/../../components/head.php'; ?>

<div id="admin-home" class="container-fluid p-0">
	<!-- navbar -->
	<?php require_once __DIR__ . '/../navbar.php' ?>

	<div class="d-flex flex-column align-items-center mt-5 additional-form">
		<h2 class="m-0">Cập nhật sản phẩm</h2>

		<form class="mt-4" action="/admin/product/edit/<?= $_SESSION['item']['id_product'] ?>" method="post" enctype="multipart/form-data">
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
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>

</div>

<?php 
	purgeSESSION('form');
	purgeSESSION('old');
	purgeSESSION('errors');
?>

<?php require_once __DIR__ . '/../../components/foot.php'; ?>
