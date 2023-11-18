<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php if(isset($_SESSION['select-by-type']) && $_SESSION['select-by-type']): ?>
			<li class="page-item <?php echo $_SESSION['home-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<?php
					if(isset($_SESSION['price']) && $_SESSION['price']) {
						if($_SESSION['price'] === 'asc') {
							$orderPrice = 'up';
						}
						elseif($_SESSION['price'] === 'desc') {
							$orderPrice = 'down';
						}
						$href = "/home?type={$_SESSION['type']}&price={$orderPrice}&page={$_SESSION['home-pagination']['prevPage']}&limit=12";
					}
					else {
						$href = "/home?type={$_SESSION['type']}&page={$_SESSION['home-pagination']['prevPage']}&limit=12";
					}
				?>
				<a class="page-link px-4 py-3" href="<?= $href ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['home-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<?php
						if(isset($_SESSION['price']) && $_SESSION['price']) {
							if($_SESSION['price'] === 'asc') {
								$orderPrice = 'up';
							}
							elseif($_SESSION['price'] === 'desc') {
								$orderPrice = 'down';
							}
							$href = "/home?type={$_SESSION['type']}&price={$orderPrice}&page={$page}&limit=12";
						}
						else {
							$href = "/home?type={$_SESSION['type']}&page={$page}&limit=12";
						}
					?>
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['home-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="<?= $href ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['home-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<?php
					if(isset($_SESSION['price']) && $_SESSION['price']) {
						if($_SESSION['price'] === 'asc') {
							$orderPrice = 'up';
						}
						elseif($_SESSION['price'] === 'desc') {
							$orderPrice = 'down';
						}
						$href = "/home?type={$_SESSION['type']}&price={$orderPrice}&page={$_SESSION['home-pagination']['nextPage']}&limit=12";
					}
					else {
						$href = "/home?type={$_SESSION['type']}&page={$_SESSION['home-pagination']['nextPage']}&limit=12";
					}
				?>
				<a class="page-link px-4 py-3" href="<?= $href ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php elseif(isset($_SESSION['search-input'])): ?>
			
			<li class="page-item <?php echo $_SESSION['search-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<?php
					$orderPrice = isset($_GET['price']) ? $_GET['price'] : false;
					if($orderPrice) {
						$href = '/search?key='. $_SESSION['search-input'] . '&price=' . $orderPrice . '&page=' . $_SESSION['search-pagination']['prevPage'] . '&limit=12';
					}
					else {
						$href = '/search?key='. $_SESSION['search-input'] . '&page=' . $_SESSION['search-pagination']['prevPage'] . '&limit=12';
					}
				?>
				<a class="page-link px-4 py-3" href="<?= $href ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['search-pagination']['pages'] as $page): ?> 
				<?php
					$orderPrice = isset($_GET['price']) ? $_GET['price'] : false;
					if($orderPrice) {
						$href = '/search?key='. $_SESSION['search-input'] . '&price=' . $orderPrice . '&page=' . $page . '&limit=12';
					}
					else {
						$href = '/search?key='. $_SESSION['search-input'] . '&page=' . $page . '&limit=12';
					}
				?>
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['search-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="<?= $href ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['search-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<?php
					$orderPrice = isset($_GET['price']) ? $_GET['price'] : false;
					if($orderPrice) {
						$href = '/search?key='. $_SESSION['search-input'] . '&price=' . $orderPrice . '&page=' . $_SESSION['search-pagination']['nextPage'] . '&limit=12';
					}
					else {
						$href = '/search?key='. $_SESSION['search-input'] . '&page=' . $_SESSION['search-pagination']['nextPage'] . '&limit=12';
					}
				?>
				<a class="page-link px-4 py-3" href="<?= $href ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>			

		<?php else: ?>
			<li class="page-item <?php echo $_SESSION['home-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/home?page=<?php echo $_SESSION['home-pagination']['prevPage'] ?>&limit=12" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['home-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['home-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/home?page=<?= $page ?>&limit=12">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['home-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/home?page=<?php echo $_SESSION['home-pagination']['nextPage'] ?>&limit=12" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php endif ?>

	</ul>
</nav>
