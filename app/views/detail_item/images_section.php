<div class="col col-md-2 p-0 pe-2 list-images-item position-relative" style="height: 420px">
	<div>
		<?php 
			$imgs = explode(';', $_SESSION['item']['images']);
		?>
		<?php for($i = 0; $i < min(count($imgs), 4); ++$i): ?>
			<?php 
				$img = $imgs[$i];
				$activeClass = ($i === 0) ? 'active-image-item' : '';
			?>
			<img src="/uploads/<?= $img ?>" class="d-block w-100 rounded-2 mb-2 <?= $activeClass ?>" alt="..." height="100px">
		<?php endfor ?>
	</div>

	<div class="position-absolute top-0 w-100 d-flex justify-content-center mt-2">
		<div class="rounded-circle control-images-btns" hidden>
			<i class="fa-solid fa-chevron-up p-3"></i>
		</div>
	</div>

	<div class="position-absolute bottom-0 w-100 d-flex justify-content-center mb-3">
		<div class="rounded-circle control-images-btns" <?php echo (count($imgs) > 4) ? '' : 'hidden' ?>>
			<i class="fa-solid fa-chevron-down p-3"></i>
		</div>
	</div>
</div>
<div class="col col-md-10 p-0 ps-2 showing-image">
	<img src="/uploads/<?= $imgs[0] ?>" class="d-block w-100 rounded-2" alt="..." style="height: 420px">
</div>